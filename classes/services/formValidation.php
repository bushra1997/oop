<?php

class userValidator
{
    private $data; // holds the data to pass in (it's private so it can't be accessed by any subclass it just can be accessed by the parent)
    private $errors = []; // array of errors we need to push if there are some errors in user datas else it will return empty, and that's why it's empty now (default=>empty)
    private static $fields = ['username', 'email', 'phone', 'password']; //i don't need to create an instance to call this property , so it's static ;but it does not have to be static

    // first method => grab data from POST
    public function __construct($post_data) //it will be called immediately when the object is instantuated
    {
        $this->data = $post_data;
    }

    // second method => validate form
    public function validateForm()
    {
        foreach (self::$fields as $field){
            if(!array_key_exists($field , $this->data)){ //if there are an errors in name attribute
                trigger_error($field.' is not present in data');
                return;
            }
        }

        $this->validate_username();
        $this->validate_password();
        $this->validate_email();
        $this->validate_phone();
        return $this->errors;
    }

    // third method => validate username
    private function validate_username()
    {
        $value = trim($this->data['username']);
        if(empty($value)){
            $this->addError('username','Username can not be empty');
        } else{
            if(!preg_match('/^[a-zA-z]{6,14}*$/',$value)){
                $this->addError('username','Username can only containe alphabets and 6-14 chars'); 
            }
        }
    }

    // 4th method => validate password
    private function validate_password()
    {
        $value = trim($this->data['password']);
        if(empty($value)){
            $this->addError('password','Password can not be empty');
        } else{
            if(!preg_match('/^{8,200}*$/',$value)){
                $this->addError('password','Password must be at least 8 digits'); 
            }
        }
    }

    // 5th method => validate email
    private function validate_email()
    {
        $value = trim($this->data['email']);
        if(empty($value)){
            $this->addError('email','Email can not be empty');
        } else{
            if(filter_var($value, FILTER_VALIDATE_EMAIL)){
                $this->addError('email','Enter a valid email address'); 
            }
        }
    }

    // 6th method => validate phone
    private function validate_phone()
    {
        $value = trim($this->data['phone']);
        if(empty($value)){
            $this->addError('phone','Phone number can not be empty');
        } elseif(!preg_match('/^[a-zA-z]{10,12}*$/',$value)){
            $this->addError('phone','Enter a valid phone number');
        }
    }
    // 7th method => send errors
    private function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
