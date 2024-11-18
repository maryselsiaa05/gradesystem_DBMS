# Dynamic Access Control System with Grading System

This project implements a **Dynamic Access Control System** with a **Grading System** to enhance security by dynamically managing user access based on behavior, context, and risk levels.

## Key Features

 **Dynamic Access Control**: Real-time evaluation of user behavior and context.
 **Grading System**: Assigns risk scores to users to adjust permissions dynamically.  
 **Two-Step Verification**: Secure login using username/password and email/secret key.  
 **Database Management**: User data and grading scores stored securely in MySQL.  



## Getting Started

### Prerequisites
- [Node.js](https://nodejs.org/)  
- [XAMPP](https://www.apachefriends.org/) for phpMyAdmin and MySQL.  

### Setup Instructions
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/dynamic-access-control.git
   cd dynamic-access-control
   ```
2. **Install Dependencies**:
   ```bash
   npm install
   ```
3. **Start the Server**:
   ```bash
   npm start
   ```
4. **Setup Database**:
   - Use phpMyAdmin to import the provided SQL script and initialize the database.  

---

## Usage

1. **Create Account**: Register with username, password, email, and secret key.  
2. **Login**: Authenticate with a two-step verification process.  
3. **Dynamic Grading**: User access permissions adapt based on real-time grading.  

---

## License

This project is licensed under the [MIT License](LICENSE).
```

When you copy and paste this into your `README.md`, the formatting will display correctly on GitHub.
