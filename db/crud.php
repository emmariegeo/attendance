<?php
    class crud {
        private $db;

        function __construct($conn) {
            $this->db = $conn;
        }

        // Insert new record into attendee database
        public function insertAttendee($fname, $lname, $dob, $specialty, $email, $contact) {
            try {
                $sql = "INSERT INTO attendee (first_name,last_name,date_of_birth,specialty_id,email_address,contact_number) VALUES (:fname,:lname,:dob,:specialty,:email,:contact)";
                $stmt = $this->db->prepare($sql);

                // Bind form data to placeholders
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Update existing record into attendee database
        public function updateAttendee($id, $fname, $lname, $dob, $specialty, $email, $contact) {
            try {
                $sql = "UPDATE `attendee` SET `first_name`=:fname,`last_name`=:lname,`date_of_birth`=:dob,`specialty_id`=:specialty,`email_address`=:email,`contact_number`=:contact WHERE `attendee_id`=:id";
                $stmt = $this->db->prepare($sql);

                // Bind form data to placeholders
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Delete existing record from attendee database
        public function deleteAttendee($id) {
            try {
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        // Retrieve list of attendees from attendee database
        public function getAttendees() {
            try {
                $sql = "SELECT * FROM `attendee` a INNER JOIN specialties s ON a.specialty_id = s.specialty_id ORDER BY attendee_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Retrieve information for one attendee
        public function getAttendeeDetails($id) {
            try {
                $sql = "SELECT * FROM `attendee` a INNER JOIN specialties s ON a.specialty_id = s.specialty_id WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Retrieve list of specialties from attendee database
        public function getSpecialties() {
            try {
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>