<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Business\UserBusinessService;

session_start();

/**
 * @name Social Network
 * @version 2.0
 * @author Holland Aucoin and Salvatore Parascandola
 *
 * @desc - LoginRegistrationController is a controller class that handles the events and page navigation of the login and register modules
 */
class LoginRegistrationController extends Controller {
	
	// Define service variable to be used as UserBusinessService
    private $service;
    
    
    /**
     * Default constructor to initialize the Business Service object
     */
    function __construct() {
        $this->service = new UserBusinessService();
    }
    
    
    /**
     * Method to authenticate a user given their credentials
     * 
     * @param $request - Request: The request object sent from the form submission
     * @return 'homePage' - View: The home page a user reaches once logged in
     * @return 'login' - View: The login page showing an error message
     */
    public function authenticateUser(Request $request) {
        // Get the variables within $request passed in through the form
        $username = $request->input('username');
        $password = $request->input('password');
        
        // Create an empty Profile object as well as a User object with the parameters
        $userProfile = new Profile("", "", "", "", "", "");
        $user = new User(0, "", "", $username, $password, "", null, null, $userProfile);
        
        // Calls the authenticate method within the business service to determine if the user is authenticated 
        if($this->service->authenticate($user)) {
            // Set $currentUser variable to user object within the session (set in business service)
            $currentUser = $_SESSION['currentUser'];
            
            // Verification to determine if the user is currently suspended
            if($currentUser->getActive() == 1) {
                //If the user is not suspended it will send the user to the homepage after setting the session of blade
                $request->session()->put('currentUser', $currentUser);
                $data = ['returnMessage' => "Welcome back " . $currentUser->getFirstName()];
                return view('homePage')->with($data);
            }
            // The user is currently suspended
            else  {
                // Set $data variable to a returnMessage containing the error information, return to the login view
                $data = ['returnMessage' => "Your account is disable, contact us for more information."];
                return view('login')->with($data);
            }
        }
        // The user failed to authenticate
        else {
        	// Set $data variable to a returnMessage containing the error information, return to the login view
            $data = ['returnMessage' => "Incorrect username or password."];
            return view('login')->with($data);
        }
    }
    
    
    /**
     * Method to register a user using the information provided
     * 
     * @param $request - Request: The request object sent from the form submission
     * @return 'homePage' - View: The home page a user reaches once registered
     * @return 'registration' - View: The registration page showing an error message
     */
    public function registerUser(Request $request) {
    	// Get the variables within $request passed in through the form
        $firstName =  $request->input('firstName');
        $lastName =  $request->input('lastName');
        $username =  $request->input('username');
        $password =  $request->input('password');
        $email =  $request->input('email');
        
        // Create an empty Profile object as well as a User object with the parameters (set to normal and active user)
        $userProfile = new Profile("", "", "", "", "", "");
        $user = new User(0, $firstName, $lastName, $username, $password, $email, 1, 1, $userProfile);
        
        // Calls the create method within the business service to register a new user
        $result = $this->service->create($user);
        
        // Verify if the creation was a success
        if($result == 1) {
        	// Set the session variable to the new user
            $request->session()->put('currentUser', $_SESSION['currentUser']);
            // Set $data variable to a returnMessage containing a welcome message, send to the homePage view
            $data = ['returnMessage' => "Thank you for joining "  . $user->getFirstName()];
            return view('homePage')->with($data);
        }
        // Failed to register the user, username already exists
        else if($result == -1) {
        	// Set $data variable to a returnMessage containing the error information, return to the registration view
            $data = ['returnMessage' => "Username is already taken, please try again."];
            return view('registration')->with($data); 
        }
        // Failed to register the user, other error occurred
        else {
        	// Set $data variable to a returnMessage containing the error information, return to the registration view
            $data = ['returnMessage' => "An error occurred trying to process your request."];
            return view('registration')->with($data); 
        }
    }
    
    
    /**
     * Method to edit a user's information
     * 
     * @param $request - Request: The request object sent from the form submission
     * @return 'profile' - View: The profile of a user containing their information
     */
    public function editUser(Request $request) {
    	// Get the variables within $request passed in through the form
    	$firstName =  $request->input('firstName');
    	$lastName =  $request->input('lastName');
    	$username =  $request->input('username');
    	$password =  $request->input('password');
    	$email =  $request->input('email');
        $bio =  $request->input('bio');
        $phoneNumber =  $request->input('phoneNumber');
        $streetAddress =  $request->input('streetAddress');
        $city =  $request->input('city');
        $state =  $request->input('state');
        $zipCode =  $request->input('zipCode');

        
        // Get the current user based on session, get the profile
        $currentUser = $request->session()->get('currentUser');
        $currentUserProfile = $currentUser->getProfile();
        
        // Set the new values to the user object model
        $currentUser->setFirstName($firstName);
        $currentUser->setLastName($lastName);
        $currentUser->setUsername($username);
        $currentUser->setPassword($password);
        $currentUser->setEmail($email);
        
        // Set the new values to the profile object model
        $currentUserProfile->setBio($bio);
        $currentUserProfile->setPhoneNumber($phoneNumber);
        $currentUserProfile->setStreetAddress($streetAddress);
        $currentUserProfile->setCity($city);
        $currentUserProfile->setState($state);
        $currentUserProfile->setZipCode($zipCode);
        
        // Set the profile of the user object to the profile object
        $currentUser->setProfile($currentUserProfile);
        
        // Call the update method within the bussiness service, set the session
        $this->service->update($currentUser);
        $_SESSION['currentUser'] = $currentUser;
        
        // Put the user as the session, return the user's profile page with the updated user model
        $request->session()->put('currentUser', $currentUser);
        return view('profile');
    }
    
    
    /**
     * Method to allow the user to log out of their account
     * 
     * @param $request - Request: The request object sent from the form submission
     * @return 'indnex' - View: The index screen of the website
     */
    public function logout(Request $request) {
        // Forget the current user within the session
        $request->session()->forget('currentUser');
        
        // Return the user to the index page
        return view('index');
    }
}