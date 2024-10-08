<?php

    class User {
        private $id;
        private $email;
        private $username;
        private $password;

        public function __construct($id = null, $email = null, $username = null, $password = null) {
            $this->id = $id;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getUsername() {
            return $this->username;
        }
        public function getPassword() {
            return $this->password;
        }
        public function setId($id) {
            $this->id = $id;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setUsername($username) {
            $this->username = $username;
        }
        public function setPassword($password) {
            $this->password = $password;
        }

    }