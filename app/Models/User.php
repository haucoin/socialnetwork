<?php

namespace App\Models;

/**
 * @name Social Network
 * @version 2.0
 * @author Holland Aucoin and Salvatore Parascandola
 * 
 * @desc - User is a model class used to hold the data and properties of a user object through different pages and methods
 */
Class User {
	
	// Define the properties of a user
    private $id;
    private $firstName;
    private $lastName;
    private $username;
    private $password;
    private $email;
    private $role;
    private $active;
    private $profile;
    
    
    /**
     * Non-default constructor to intialize an object
     * 
     * @param $id - int: The unique id of a user for identification
     * @param $firstName - String: The first name of a user
     * @param $lastName - String: The last name of a user
     * @param $username - String: The username of a user, used for authentication
     * @param $password - String: The password of a user, used for authentication
     * @param $email - String: The email address of a user
     * @param $role - String: The role (regular user or admin) of a user
     * @param $active - String: The email address of a user
     * @param $profile - Profile: An object containing the user's profile information
     */
    function __construct($id, $firstName, $lastName, $username, $password, $email, $role, $active, Profile $profile) {
    	$this->id = $id;
    	$this->firstName = $firstName;
    	$this->lastName = $lastName;
    	$this->username = $username;
    	$this->password = $password;
    	$this->email = $email;
    	$this->role = $role;
    	$this->active = $active;
    	$this->profile = $profile;
    }
    
    
    /**
     * Getters and setters
     * 
     * @param - variables
     * @return - variables
     */
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getRole() {
		return $this->role;
	}

	public function setRole($role) {
		$this->role = $role;
	}

	public function getActive() {
		return $this->active;
	}

	public function setActive($active) {
		$this->active = $active;
	}

	public function getProfile() {
		return $this->profile;
	}

	public function setProfile($profile) {
		$this->profile = $profile;
	}
    
}