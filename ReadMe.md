# Simple Library Website Project

## Summary

This project is a simple web-based library information system built using PHP and MySQL. This application allows for the management of book data, student data, and book borrowing records. There are two main access levels in this system: **admin** and **user** (student).

---

### Features

This application has several main features, divided by access level:

#### **Admin Features**

* **Login**: Admins have a dedicated login page to access the admin dashboard.
* **Dashboard**: The main admin page that displays a navigation menu to manage various data.
* **Book Management**:
    * **Add New Books**: Admins can add new book information such as book number, title, author, publisher, and publication year.
    * **View Book List**: Displays all books stored in the database.
    * **Update Book Data**: Admins can edit the information of existing books.
    * **Delete Books**: Removes book data from the database.
* **Student Management**:
    * **Add New Students**: Admins can register new students by entering their Student ID Number (NIS), name, class, gender, and address.
    * **View Student List**: Displays all registered student data.
    * **Update Student Data**: Updates information about students.
    * **Delete Students**: Removes student data from the system.
* **Loan Management**:
    * **Add Loan Records**: Records book borrowing transactions by students.
    * **View Loan History**: Displays a list of all borrowing transactions and their statuses.
    * **Confirm Returns**: Admins can confirm when a book has been returned.
    * **Delete Loan Records**: Removes borrowing transaction history.
* **Search**: Admins can easily search for book, student, or loan data using keywords.
* **Logout**: Admins can log out of their session.

#### **User (Student) Features**

* **Registration**: New users (students) can create an account by registering their name, username, and password.
* **Login**: Students can log into the system using their created account.
* **Dashboard**: The main page for students after a successful login.
* **View Book List**: Students can see the collection of books available in the library.
* **View Student List**: Students can see a list of other registered students.
* **Loan Management**:
    * **Borrow a Book**: Students can borrow books.
    * **View Loan History**: Displays the history of books they have borrowed.
* **Logout**: Students can log out of their accounts.

---

### Technologies Used

* **Backend**: PHP
* **Frontend**: HTML & CSS
* **Database**: MySQL

---

### Directory Structure
.
├── admin/
│   ├── buku.php
│   ├── dbcon.php
│   ├── depan.php
│   ├── editBuku.php
│   ├── editSiswa.php
│   ├── hapus-buku.php
│   ├── hapus-peminjaman.php
│   ├── hapus-siswa.php
│   ├── home.php
│   ├── img/
│   ├── index.php
│   ├── logout.php
│   ├── peminjaman.php
│   ├── simpan-buku.php
│   ├── simpan-edit-buku.php
│   ├── simpan-edit-siswa.php
│   ├── simpan-pinjam.php
│   ├── simpan-siswa.php
│   ├── siswa.php
│   ├── style.css
│   └── style2.css
├── img/
├── .gitignore
├── buku.php
├── dbcon.php
├── depan.php
├── home.php
├── index.php
├── logout.php
├── peminjaman.php
├── registrasi.php
├── simpan-pinjam.php
├── simpan-siswa.php
├── siswa.php
├── style.css
└── style2.css
---

### Installation and Usage

To run this application in a local environment, follow these steps:

1.  **Download and Install XAMPP**: Make sure you have downloaded and installed XAMPP or a similar web server that supports PHP and MySQL.
2.  **Move the Project**: Place the entire project folder into the `htdocs` directory within your XAMPP installation folder.
3.  **Database**:
    * Create a new database in phpMyAdmin named `perpustakaan`.
    * Import the `.sql` file that contains the required table structures for this application. The necessary tables include: `buku`, `siswa`, `peminjaman`, `user`, and `formadmin`.
4.  **Run the Application**: Open your browser and go to `http://localhost/[project_folder_name]` for the user page or `http://localhost/[project_folder_name]/admin` for the admin page.