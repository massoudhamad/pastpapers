<?php
/*
 * conn Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * with PHP Data Objects (PDO)
 * @author    Massoud Hamad
 * @url       http://www.hmytechnologies.com
 */
require_once('dbconfig.php');
define('SALT_LENGTH', 9);
class DBHelper
{

    private $conn;

    public function __construct()
    {

        $database = new Database();
        $conn = $database->dbConnection();
        $this->conn = $conn;
    }

    public function runQuery($sql)
    {
        $sql = $this->conn->quote($sql);
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }


    public function PwdHash($pwd, $salt = null)
    {
        if ($salt === null) {
            $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
        } else {
            $salt = substr($salt, 0, SALT_LENGTH);
        }
        return $salt . sha1($pwd . $salt);
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table, $conditions = array())
    {
        $sql = 'SELECT';
        $sql .= array_key_exists("select", $conditions) ? $conditions['select'] : '*';
        $sql .= ' FROM ' . $table;
        if (array_key_exists("where", $conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($conditions['where'] as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $sql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }

        if (array_key_exists("order_by", $conditions)) {
            $sql .= ' ORDER BY ' . $conditions['order_by'];
        }

        if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
        } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['limit'];
        }

        $query = $this->conn->prepare($sql);
        $query->execute();

        if (array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all') {
            switch ($conditions['return_type']) {
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        } else {
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll();
            }
        }
        return !empty($data) ? $data : false;
    }

    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            $columns = '';
            $values = '';
            $i = 0;
            if (!array_key_exists('createdDate', $data)) {
                $data['createdDate'] = date("Y-m-d H:i:s");
            }
            if (!array_key_exists('modifiedDate', $data)) {
                $data['modifiedDate'] = date("Y-m-d H:i:s");
            }

            /*if(!array_key_exists('createdBy',$data)){
                $data['createdBy'] = $_SESSION['user_session'];
            }*/
            $columnString = implode(',', array_keys($data));
            $valueString = ":" . implode(',:', array_keys($data));
            $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
            //$sql=$this->conn->quote($sql);
            $query = $this->conn->prepare($sql);
            foreach ($data as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }
            $insert = $query->execute();
            return $insert ? $this->conn->lastInsertId() : true;
        } else {
            return false;
        }
    }

    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table, $data, $conditions)
    {
        if (!empty($data) && is_array($data)) {
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            if (!array_key_exists('modifiedDate', $data)) {
                $data['modifiedDate'] = date("Y-m-d H:i:s");
            }
            if (!array_key_exists('createdBy', $data)) {
                $data['createdBy'] = $_SESSION['user_session'];
            }
            foreach ($data as $key => $val) {
                $pre = ($i > 0) ? ', ' : '';
                $colvalSet .= $pre . $key . "='" . $val . "'";
                $i++;
            }
            if (!empty($conditions) && is_array($conditions)) {
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach ($conditions as $key => $value) {
                    $pre = ($i > 0) ? ' AND ' : '';
                    $whereSql .= $pre . $key . " = '" . $value . "'";
                    $i++;
                }
            }
            $sql = "UPDATE " . $table . " SET " . $colvalSet . $whereSql;
            //$sql=$this->conn->quote($sql);
            $query = $this->conn->prepare($sql);
            $update = $query->execute();
            return $update ? $query->rowCount() : false;
        } else {
            return false;
        }
    }

    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */
    public function delete($table, $conditions)
    {
        $whereSql = '';
        if (!empty($conditions) && is_array($conditions)) {
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $whereSql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }
        $sql = "DELETE FROM " . $table . $whereSql;
        $delete = $this->conn->exec($sql);
        return $delete ? $delete : false;
    }


    public function doLogin($uname, $upass)
    {
        try {
            $stmt = $this->conn->prepare("SELECT u.userID,userName,password,status,roleID FROM users u,userroles ur WHERE u.userID=ur.userID and userName=:uname and status=:st");
            $stmt->execute(array(':uname' => $uname, 'st' => 1));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if ($userRow['password'] === $this->PwdHash($upass, substr($userRow['password'], 0, 9))) {
                    $_SESSION['user_session'] = $userRow['userID'];
                    $_SESSION['role_session'] = $userRow['roleID'];
                    //$_SESSION['user_privilege']=$userRow['user_privilege'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function doLogout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    //get Single Record
    public function getData($table, $attrName, $id, $id2)
    {
        try {
            $query = $this->getRows($table, array('where' => array($id => $id2), ' order_by' => $attrName . '  ASC'));
            if (!empty($query)) {
                foreach ($query as $q) {
                    $attrName = $q[$attrName];
                }
                return $attrName;
            }
        } catch (PDOException $exception) {
            echo "Getting Data error: " . $exception->getMessage();
        }
    }

    public function isFieldExist($table, $field, $field2)
    {
        try {
            $query = $this->getRows($table, array('where' => array($field => $field2), 'order_by' => $field . ' ASC'));
            if (!empty($query)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exception) {
            echo "Getting Data error: " . $exception->getMessage();
        }
    }
//end of DBHelper Class
}