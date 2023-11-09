<?php
    class Customers{
        private $customer_id;
        private $customer_name;
        private $customer_phone;
        private $customer_address;
        private $customer_email;
        private $customer_password;

        // phương thức khởi tạo
        function __construct($id,$fullname,$phone,$address,$email,$password){
            $this->customer_id = $id;
            $this->customer_name = $fullname;
            $this->customer_phone = $phone;
            $this->customer_address = $address;
            $this->customer_email = $email;
            $this->customer_password = $password;
        }
        //getters
        public function getCustomerID(){
            return $this->customer_id;
        }
        public function getCustomerName(){
            return $this->name;
        }
        public function getCustomerPhone(){
            return $this->customer_phone;
        }
        public function getCustomerAddress(){
            return $this->customer_address;
        }
        public function getCustomerEmail(){
            return $this->customer_email;
        }
        public function getCustomerPassword(){
            return $this->customer_password;
        }
        // setters
        public function setCustomerID($ID){
            $this->customer_id = $ID;
        }
        public function setCustomerName($fullName){
            $this->customer_name = $fullname;
        }
        public function setCustomerPhone($phone){
            $this->customer_phone = $phone;
        }
        public function setCustomerAddress($address){
            $this->customer_address = $address;
        }
        public function setCustomerEmail($email){
            $this->customer_email = $email;
        }
        public function setCustomerPassword($password){
            $this->customer_password = $password;
        }
        //other's method
        public function toString(){
            return $this->customer_id."\t".$this->customer_name."\t".$this->customer_phone."\t".$this->customer_address."\t".$this->customer_email."\t".$this->customer_password."\n";
        }
    }
    $c = new Customers("CS01","Doan Van Quan","0867687695","Bac Giang","dvquan210502@gmail.com","abc123");
    echo $c->toString();

?>