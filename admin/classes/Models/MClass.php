<?php
    require_once 'ConnectDB.php';

    class Classes
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM classes';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        
        public function setInsertData($id, $className, $question_group, $time,$startDay,$endDay)
        {
            $sql = 'INSERT INTO classes VALUES (?,?,?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $className, $question_group, $time,$startDay,$endDay]);
        }

        public function getClassName()
        {
            $sql = 'SELECT classes.className FROM classes';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getClassNameAndID()
        {
            $sql = 'SELECT classes.className,classes.id FROM classes';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getDataByClassName($className)
        {
            $sql = 'SELECT * FROM classes WHERE className = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$className],false);
        }

        public function updateData($className, $question_group, $time,$startday,$endday, $id)
        {
            $sql = 'UPDATE classes SET className = ?, question_group = ?, created_at = ?, startday = ?, endday = ? WHERE className = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$className, $question_group, $time,$startday,$endday, $id]);
        }

        public function createTriggerForUpdate()
        {
            $sql = "
            CREATE TRIGGER update_classes_question_groups_after_classes
            AFTER UPDATE ON classes
            FOR EACH ROW
            BEGIN
                UPDATE classes_question_groups
                SET classes_question_groups.question_groups_id = NEW.question_group
                WHERE classes_question_groups.classes_question_group = NEW.id;
            END;
            ";
            $this->connect->setQuery($sql);
            $this->connect->execute();
        }

        public function createTriggerForInsert()
        {
            // Thay đổi dấu phân cách để định nghĩa trigger
            $this->connect->setQuery("DELIMITER //");
            $this->connect->execute();

            // Tạo trigger
            $sql = "
                CREATE TRIGGER insert_classes_question_groups_after_classes
                AFTER INSERT ON classes
                FOR EACH ROW
                BEGIN
                    INSERT INTO classesx_question_groups (classes_question_group, question_groups_id)
                    VALUES (NEW.id, NEW.question_group);
                END;
            ";
            $this->connect->setQuery($sql);
            $this->connect->execute();

            // Khôi phục dấu phân cách về ;
            $this->connect->setQuery("DELIMITER ;");
            $this->connect->execute();
        }

        public function deleteData($id,$id2)
        {
            $sql = 'DELETE FROM student_classes WHERE student_class = ?;DELETE FROM classes WHERE id = ?;';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id,$id2]);
        }

        public function getDayExam($className)
        {
            $sql = 'SELECT startday,endday FROM classes WHERE className = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$className],false);
        }
    }
?>