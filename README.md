

---

# Student’s College Accommodation System



## 1 - Login/Landing Page
- **File name**: `index.php`

## 2 - Configuration File
- **File name**: `config.php`

## 3 - Database Name
- **Database name**: `accommodationdatabase`

## 4 - Login Details
**User Table:**

| Username | Password | Level |
|----------|----------|-------|
| admin    | admin    | 1     |
| manager  | manager  | 2     |
| student  | student  | 3     |

## 5 - Features and Descriptions

### 5.1 - Session Management
Sessions help us maintain user-specific information across different pages. When a user logs in, we start a session using `session_start()`, and this allows us to keep track of the user’s data as they navigate through the site. 

- **Where it's used**: `check_login.php`

### 5.2 - Cookie Usage
Cookies are small files stored on the user’s computer. We use them to remember the user’s information, such as their username. Every time the user visits the site, the cookie helps identify them.

- **Where it's used**: `check_login.php`, `main.php`

### 5.3 - User Input Validation
We use JavaScript to make sure users provide the correct information before submitting forms. For example, on the login page and the accommodation application form, we check if all required fields are filled out.

- **Where it's used**: `javascript.js`, `accommodation_application_form.php`

### 5.4 - Dynamic HTML with JavaScript (DOM)
The DOM (Document Object Model) allows us to dynamically update the content of our web pages. For example, if a user tries to log in without entering their details, JavaScript focuses on the input field that needs attention.

- **Where it's used**: `javascript.js`

### 5.5 - Clean and Attractive Presentation
We aim to make our site visually appealing and easy to navigate. We use a consistent color scheme (grey and gold) and ensure all our pages have a clean and uniform look. 

- **Design elements**: The system name is displayed on all pages, tables have a consistent format with a stylish header, and the overall design is neat and attractive.


---


