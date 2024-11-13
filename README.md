<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Diagram documentation
## Summary

- [Introduction](#introduction)
- [Database Type](#database-type)
- [Table Structure](#table-structure)
    - [Students](#Students)
    - [Teachers](#Teachers)
    - [Documents](#Documents)
    - [Olympiads](#Olympiads)
    - [Attendance](#Attendance)
    - [Classes](#Classes)
    - [Grades](#Grades)
    - [Olympiad_Results](#Olympiad_Results)
    - [Courses](#Courses)
    - [Student_Courses](#Student_Courses)
- [Relationships](#relationships)
- [Database Diagram](#database-Diagram)

## Introduction

## Database type

- **Database system:** MySQL
## Table structure

### Students

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **student_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **first_name** | VARCHAR(50) | not null  |  | |
| **last_name** | VARCHAR(50) | not null  |  | |
| **date_of_birth** | DATE | not null  |  | |
| **gender** | ENUM | not null  |  | |
| **enrollment_date** | DATE | not null  |  | | 

#### Enums
##### gender

- Male
- Female
- Other


### Teachers

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **teacher_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **first_name** | VARCHAR(50) | not null  |  | |
| **last_name** | VARCHAR(50) | not null  |  | |
| **email** | VARCHAR(100) | not null , unique |  | |
| **subject** | VARCHAR(100) | not null  |  | |
| **hire_date** | DATE | not null  |  | | 


### Documents

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **document_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **title** | VARCHAR(200) | not null  |  | |
| **upload_date** | DATETIME | not null , default: CURRENT_TIMESTAMP |  | |
| **file_path** | VARCHAR(255) | not null  |  | |
| **uploaded_by** | INTEGER | not null  | Documents_uploaded_by_fk | | 


### Olympiads

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **olympiad_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **name** | VARCHAR(100) | not null  |  | |
| **date** | DATE | not null  |  | |
| **location** | VARCHAR(200) | not null  |  | |
| **description** | TEXT | not null  |  | | 


### Attendance

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **attendance_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **student_id** | INTEGER | not null  | Attendance_student_id_fk | |
| **class_date** | DATE | not null  |  | |
| **status** | ENUM | not null  |  | | 

#### Enums
##### status

- Present
- Absent
- Late


### Classes

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **class_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **class_name** | VARCHAR(100) | not null  |  | |
| **teacher_id** | INTEGER | not null  | Classes_teacher_id_fk | |
| **schedule** | VARCHAR(255) | not null  |  | | 


### Grades

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **grade_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **student_id** | INTEGER | not null  | Grades_student_id_fk | |
| **subject** | VARCHAR(100) | not null  |  | |
| **grade** | DECIMAL(5,2) | not null  |  | |
| **semester** | ENUM | not null  |  | | 

#### Enums
##### semester

- Fall
- Spring


### Olympiad_Results

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **result_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **olympiad_id** | INTEGER | not null  | Olympiad_Results_olympiad_id_fk | |
| **student_id** | INTEGER | not null  | Olympiad_Results_student_id_fk | |
| **position** | INTEGER | not null  |  | | 


### Courses

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **course_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **course_name** | VARCHAR(100) | not null  |  | |
| **description** | TEXT | not null  |  | | 


### Student_Courses

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **student_course_id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **student_id** | INTEGER | not null  | Student_Courses_student_id_fk | |
| **course_id** | INTEGER | not null  | Student_Courses_course_id_fk | | 


## Relationships

- **Documents to Teachers**: many_to_one
- **Attendance to Students**: many_to_one
- **Classes to Teachers**: many_to_one
- **Grades to Students**: many_to_one
- **Olympiad_Results to Olympiads**: many_to_one
- **Olympiad_Results to Students**: many_to_one
- **Student_Courses to Students**: many_to_one
- **Student_Courses to Courses**: many_to_one

## Database Diagram

```mermaid
erDiagram
    Documents ||--o{ Teachers : references
    Attendance ||--o{ Students : references
    Classes ||--o{ Teachers : references
    Grades ||--o{ Students : references
    Olympiad_Results ||--o{ Olympiads : references
    Olympiad_Results ||--o{ Students : references
    Student_Courses ||--o{ Students : references
    Student_Courses ||--o{ Courses : references

    Students {
        INTEGER student_id
        VARCHAR(50) first_name
        VARCHAR(50) last_name
        DATE date_of_birth
        ENUM gender
        DATE enrollment_date
    }

    Teachers {
        INTEGER teacher_id
        VARCHAR(50) first_name
        VARCHAR(50) last_name
        VARCHAR(100) email
        VARCHAR(100) subject
        DATE hire_date
    }

    Documents {
        INTEGER document_id
        VARCHAR(200) title
        DATETIME upload_date
        VARCHAR(255) file_path
        INTEGER uploaded_by
    }

    Olympiads {
        INTEGER olympiad_id
        VARCHAR(100) name
        DATE date
        VARCHAR(200) location
        TEXT description
    }

    Attendance {
        INTEGER attendance_id
        INTEGER student_id
        DATE class_date
        ENUM status
    }

    Classes {
        INTEGER class_id
        VARCHAR(100) class_name
        INTEGER teacher_id
        VARCHAR(255) schedule
    }

    Grades {
        INTEGER grade_id
        INTEGER student_id
        VARCHAR(100) subject
        DECIMAL(5,2) grade
        ENUM semester
    }

    Olympiad_Results {
        INTEGER result_id
        INTEGER olympiad_id
        INTEGER student_id
        INTEGER position
    }

    Courses {
        INTEGER course_id
        VARCHAR(100) course_name
        TEXT description
    }

    Student_Courses {
        INTEGER student_course_id
        INTEGER student_id
        INTEGER course_id
    }
```