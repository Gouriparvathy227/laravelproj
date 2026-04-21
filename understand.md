# Understanding St. George's College Management System

## What is This Project?

This is a **complete College Management System and Website** built for **St. George's College Aruvithura**, a NAAC A++ accredited institution in Kerala, India (Est. 1965). Think of it as a digital hub that handles everything from:

- **Public Website** - Showcasing the college to visitors
- **Online Admissions** - Students can apply with document uploads
- **Contact System** - Inquiries are stored and manageable by admins
- **Faculty Directory** - Dynamic faculty profiles with photos
- **Department Management** - Full CRUD for college departments
- **Homepage Slider** - Image carousel managed by admins
- **Role-Based Dashboards** - Different views for students, faculty, and admins

---

## Table of Contents
1. [The Big Picture - How It All Works](#the-big-picture)
2. [What Technologies Are Used](#what-technologies-are-used)
3. [Project Structure - Complete File Map](#project-structure)
4. [Main Features - Detailed Capabilities](#main-features)
5. [Database Schema - All Tables Explained](#database-schema)
6. [Models - Data Structures](#models)
7. [Controllers - Application Logic](#controllers)
8. [Routes - URL Mapping](#routes)
9. [Views - Frontend Pages](#views)
10. [User Roles & Permissions](#user-roles--permissions)
11. [File Storage System](#file-storage-system)
12. [Deployment Options](#deployment-options)
13. [How to Get Started](#how-to-get-started)

---

## The Big Picture

Imagine the college as a physical building. This software is like that building, but online:

```
┌──────────────────────────────────────────────────────────────────────┐
│                      VISITORS (Public Users)                          │
│   ┌──────────┐  ┌──────────┐  ┌──────────┐  ┌──────────┐           │
│   │   Home   │  │  About   │  │Admissions│  │ Contact  │           │
│   │   Page   │  │   Page   │  │   Page   │  │   Page   │           │
│   └────┬─────┘  └────┬─────┘  └────┬─────┘  └────┬─────┘           │
│        └─────────────┴─────────────┴─────────────┘                 │
│                           │                                         │
│              ┌────────────┴────────────┐                          │
│              │      Public Website        │                          │
│              │  (No login required)       │                          │
│              └────────────┬──────────────┘                          │
└───────────────────────────┼─────────────────────────────────────────┘
                            │
┌───────────────────────────┼─────────────────────────────────────────┐
│                      LOGGED-IN USERS                                 │
│                           │                                         │
│    ┌──────────────────────┼──────────────────────┐                  │
│    │                      │                      │                  │
│ ┌──▼─────┐          ┌─────▼──────┐        ┌──────▼─────┐            │
│ │Student │          │  Faculty   │        │   Admin    │            │
│ └──┬─────┘          └─────┬──────┘        └──────┬─────┘            │
│    │                      │                      │                   │
│    ├─ Results             ├─ Class Management    ├─ Manage Everything  │
│    ├─ Fee Status         ├─ Upload Materials    ├─ View Inquiries   │
│    ├─ Materials          ├─ Mark Attendance     ├─ Manage Faculty   │
│    ├─ Timetable          ├─ Enter Results       ├─ Manage Depts     │
│    ├─ Notices            └─ View Profile        ├─ Home Sliders     │
│    └─ Services                                    └─ User Management  │
│                                                                     │
└─────────────────────────────────────────────────────────────────────┘
```

---

## What Technologies Are Used

### Core Stack (LAMP/LEMP Equivalent)

| Technology | Version | Purpose | Analogy |
|------------|---------|---------|---------|
| **PHP** | 8.2+ | Programming language | The foundation concrete |
| **Laravel** | 12.0 | Web framework | The building's structure |
| **SQLite** | 3.x | Database | The filing cabinet |
| **Tailwind CSS** | 3.x | Styling framework | Interior designer |
| **Alpine.js** | 3.x | JavaScript framework | Light switches |
| **Vite** | 7.x | Build tool | Delivery truck |
| **Composer** | 2.x | PHP package manager | Material supplier |
| **npm** | 9.x | JS package manager | Electronics supplier |

### Laravel Packages Used

```json
"require": {
    "php": "^8.2",
    "laravel/framework": "^12.0",
    "laravel/tinker": "^2.10.1"
}
```

### Development Tools

```json
"require-dev": {
    "laravel/breeze": "^2.4",      // Authentication scaffolding
    "laravel/pail": "^1.2.2",       // Log viewer
    "laravel/pint": "^1.24",        // Code linter
    "laravel/sail": "^1.41",        // Docker environment
    "phpunit/phpunit": "^11.5.50"   // Testing framework
}
```

---

## Project Structure

### Complete Directory Tree

```
GOURI PROJECT/
│
├── 📁 app/                                    # Application Core (The Brain)
│   ├── 📁 Http/
│   │   ├── 📁 Controllers/
│   │   │   ├── 📁 Admin/                    # Admin Controllers
│   │   │   │   ├── AdmissionController.php
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── DepartmentController.php
│   │   │   │   ├── FacultyController.php
│   │   │   │   ├── GalleryController.php
│   │   │   │   ├── HomeSliderController.php
│   │   │   │   ├── InquiryController.php
│   │   │   │   ├── NoticeController.php
│   │   │   │   ├── PlacementController.php
│   │   │   │   ├── ProgramController.php
│   │   │   │   ├── ReportController.php
│   │   │   │   └── StudentController.php
│   │   │   ├── 📁 Auth/                     # Authentication
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── 📁 Faculty/                  # Faculty Portal
│   │   │   │   └── DashboardController.php
│   │   │   ├── 📁 Student/                  # Student Portal
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── FeeController.php
│   │   │   │   ├── MaterialController.php
│   │   │   │   ├── NoticeController.php
│   │   │   │   ├── ProfileController.php
│   │   │   │   ├── ResultController.php
│   │   │   │   ├── ServiceController.php
│   │   │   │   └── TimetableController.php
│   │   │   ├── AcademicsController.php
│   │   │   ├── AdmissionController.php      # Public admission handling
│   │   │   ├── ContactController.php        # Contact form handling
│   │   │   ├── Controller.php
│   │   │   ├── DepartmentController.php
│   │   │   ├── EventController.php
│   │   │   ├── FacultyController.php
│   │   │   ├── GalleryController.php
│   │   │   ├── HomeController.php
│   │   │   ├── NoticeController.php
│   │   │   ├── PageController.php
│   │   │   ├── PlacementController.php
│   │   │   ├── ProfileController.php
│   │   │   └── ProgramController.php
│   │   └── 📁 Middleware/                   # Security guards
│   ├── 📁 Models/                           # Data Models
│   │   ├── AdmissionApplication.php
│   │   ├── ContactInquiry.php
│   │   ├── Department.php
│   │   ├── FacultyProfile.php
│   │   ├── HomeSlider.php
│   │   └── User.php
│   └── 📁 Providers/                        # Service providers
│
├── 📁 database/                             # Data Storage
│   ├── 📁 factories/
│   ├── 📁 migrations/                       # Database blueprints
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2026_04_13_000001_create_core_tables.php
│   │   ├── 2026_04_14_000002_create_home_sliders_table.php
│   │   ├── 2026_04_19_000003_create_admission_applications_table.php
│   │   ├── 2026_04_19_000004_create_contact_inquiries_table.php
│   │   └── 2026_04_19_000005_create_faculty_profiles_table.php
│   ├── 📁 seeders/                          # Sample data
│   │   ├── AdminUserSeeder.php
│   │   └── DatabaseSeeder.php
│   └── database.sqlite                      # Actual database file
│
├── 📁 resources/                            # Frontend Resources
│   ├── 📁 css/
│   │   └── app.css
│   ├── 📁 js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── 📁 views/                            # All Blade templates
│       ├── 📁 admin/                        # Admin panel views
│       │   ├── dashboard.blade.php
│       │   ├── departments/
│       │   ├── faculty/
│       │   ├── home-sliders/
│       │   └── inquiries/
│       ├── 📁 admissions/                   # Admission pages
│       │   ├── apply.blade.php
│       │   ├── index.blade.php
│       │   └── status.blade.php
│       ├── 📁 auth/                         # Login/register
│       ├── 📁 components/                   # Reusable UI pieces
│       ├── 📁 contact/                      # Contact page
│       ├── 📁 departments/                  # Department pages
│       ├── 📁 faculty/                      # Faculty pages
│       ├── 📁 layouts/                      # Page templates
│       │   ├── app.blade.php
│       │   ├── frontend.blade.php
│       │   ├── guest.blade.php
│       │   └── navigation.blade.php
│       ├── 📁 student/                      # Student portal
│       ├── about.blade.php
│       ├── facilities.blade.php
│       ├── history.blade.php
│       ├── home.blade.php                   # Homepage with slider
│       ├── student-life.blade.php
│       └── welcome.blade.php
│
├── 📁 routes/                               # URL Routing
│   ├── auth.php                             # Login/logout routes
│   ├── console.php                          # CLI commands
│   └── web.php                              # Main website routes
│
├── 📁 public/                               # Public Access Point
│   ├── 📁 assets/
│   │   ├── 📁 css/
│   │   │   └── styles.css
│   │   ├── 📁 js/
│   │   │   └── main.js
│   │   └── 📁 images/
│   ├── 📁 build/                            # Compiled assets
│   ├── .htaccess
│   ├── favicon.ico
│   └── index.php                            # Entry point
│
├── 📁 storage/                              # File Storage
│   ├── 📁 app/
│   │   └── 📁 public/                       # Uploaded files
│   │       ├── admissions/documents/        # Admission docs
│   │       ├── faculty/photos/              # Faculty photos
│   │       └── home-sliders/                # Slider images
│   ├── 📁 framework/
│   └── 📁 logs/
│
├── 📁 config/                               # Configuration files
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── filesystems.php
│   └── ... (10 total)
│
├── 📁 tests/                                # Automated tests
│   ├── 📁 Feature/
│   └── 📁 Unit/
│
├── 📁 api/                                  # Vercel API entry
│   └── index.php
│
├── 📁 scripts/                              # Build scripts
│
├── .env                                     # Environment variables
├── .env.example                             # Environment template
├── composer.json                            # PHP dependencies
├── composer.lock                            # Locked versions
├── Dockerfile                               # Docker image config
├── package.json                             # JS dependencies
├── vercel.json                              # Vercel deployment config
├── render.yaml                              # Render deployment config
├── phpunit.xml                              # Testing config
├── tailwind.config.js                       # Tailwind CSS config
└── vite.config.js                           # Vite build config
```

---

## Main Features

### 1. Public Website Features

| Page | URL | Features |
|------|-----|----------|
| **Home** | `/` | Hero slider, statistics counter, upcoming events, quick access, department links, testimonials, top recruiters |
| **About** | `/about` | College overview, vision, mission |
| **History** | `/history` | Timeline of college milestones |
| **Facilities** | `/facilities` | Campus infrastructure details |
| **Student Life** | `/student-life` | Clubs, activities, campus culture |
| **Academics** | `/academics` | Programs overview |
| **Departments** | `/departments` | List of 15 departments |
| **Department Detail** | `/departments/{slug}` | Individual department page |
| **Programs** | `/programs` | Course listings |
| **Admissions** | `/admissions` | Admission process info |
| **Apply Online** | `/admissions/apply` | **Full application form with file uploads** |
| **Check Status** | `/admissions/status/{id}` | **Application tracking** |
| **Placements** | `/placements` | Recruitment records |
| **Notices** | `/notices` | Announcements |
| **Events** | `/events` | College events |
| **Faculty** | `/faculty` | **Dynamic faculty directory** |
| **Gallery** | `/gallery` | Photo collections |
| **Contact** | `/contact` | **Form that saves to database** |

### 2. Admin Portal Features (`/admin/*`)

| Feature | Routes | Description |
|---------|--------|-------------|
| **Dashboard** | `/admin/dashboard` | Overview statistics |
| **Home Sliders** | `/admin/home-sliders` | Manage homepage carousel images |
| **Departments** | `/admin/departments` | CRUD operations for 15 departments |
| **Faculty** | `/admin/faculty` | Manage faculty profiles with photos |
| **Inquiries** | `/admin/inquiries` | View and manage contact form submissions |

### 3. Admission System Features

```
┌─────────────────────────────────────────────────────────┐
│                  ADMISSION WORKFLOW                      │
├─────────────────────────────────────────────────────────┤
│                                                         │
│  1. STUDENT VISITS /admissions/apply                   │
│     └─> Sees comprehensive application form            │
│                                                         │
│  2. FILLS APPLICATION                                  │
│     ├─ Personal: Name, DOB, Gender, Category           │
│     ├─ Contact: Phone, Email, Address                │
│     ├─ Academic: School, Board, Percentage, Year     │
│     ├─ Preferences: 3 program choices                  │
│     └─ **Documents: Marksheet, TC, Community cert**    │
│                                                         │
│  3. SUBMITS FORM                                       │
│     └─> System generates unique ID: SGC2026####       │
│     └─> Files stored in storage/app/public/            │
│     └─> Record saved in admission_applications table  │
│                                                         │
│  4. CHECKS STATUS                                      │
│     └─> Visits /admissions/status/{id}                │
│     └─> Sees: pending/shortlisted/admitted/rejected   │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

### 4. Contact System Features

```
┌─────────────────────────────────────────────────────────┐
│                 CONTACT WORKFLOW                       │
├─────────────────────────────────────────────────────────┤
│                                                         │
│  1. VISITOR FILLS FORM                                 │
│     ├─ Name (required)                                 │
│     ├─ Email (required)                                │
│     ├─ Phone (optional)                                │
│     ├─ Topic (optional)                                │
│     ├─ Message (required)                              │
│     └─ Captcha verification                            │
│                                                         │
│  2. FORM SUBMITS TO /contact (POST)                    │
│     └─> Saves to contact_inquiries table               │
│     └─> Shows success message                           │
│                                                         │
│  3. ADMIN CHECKS /admin/inquiries                     │
│     └─> Sees paginated list (20 per page)              │
│     └─> Can delete after responding                    │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

---

## Database Schema

### Complete Table Structure

#### 1. `users` - Login Accounts
```php
- id: BIGINT (Primary key)
- name: VARCHAR(255) - Full name
- email: VARCHAR(255) UNIQUE - Login email
- email_verified_at: TIMESTAMP - Verification date
- password: VARCHAR(255) - Hashed password
- role: ENUM('super_admin', 'dept_admin', 'faculty', 'student', 'public')
- department_id: BIGINT NULL - Foreign key to departments
- is_active: BOOLEAN - Account status
- rememberToken: VARCHAR(100) - "Remember me" token
- timestamps: created_at, updated_at
```

#### 2. `home_sliders` - Homepage Carousel Images
```php
- id: BIGINT
- title: VARCHAR(255) NULL - Slide heading
- caption: TEXT NULL - Slide description
- image_path: VARCHAR(255) - Storage path
- alt_text: VARCHAR(255) NULL - Accessibility text
- display_order: INT - Sort order (0, 1, 2...)
- is_active: BOOLEAN - Show/hide
- uploaded_by: BIGINT NULL - User who uploaded
- timestamps
```

#### 3. `admission_applications` - Online Applications
```php
- id: BIGINT
- application_id: VARCHAR(20) UNIQUE - e.g., "SGC20267890"
- full_name: VARCHAR(255)
- dob: DATE - Date of birth
- gender: VARCHAR(20) - Male/Female/Other
- category: VARCHAR(30) - General/SC/ST/OBC/Minority
- religion: VARCHAR(100) NULL
- phone: VARCHAR(20)
- email: VARCHAR(255)
- address: TEXT
- school: VARCHAR(255) - Previous school
- board: VARCHAR(120) - Education board
- pass_year: SMALLINT - Year passed (2000-2100)
- subject_combo: VARCHAR(255) - Subjects studied
- percentage: DECIMAL(5,2) - Marks percentage (0-100)
- pref1, pref2, pref3: VARCHAR(120) - Program preferences
- doc_marksheet_path: VARCHAR(255) - PDF storage path
- doc_tc_path: VARCHAR(255) - Transfer certificate
- doc_community_path: VARCHAR(255) NULL - Community cert
- status: VARCHAR(30) DEFAULT 'pending'
  └─ Values: pending, shortlisted, admitted, rejected
- remarks: TEXT NULL - Admin notes
- timestamps
- INDEX on status
```

#### 4. `contact_inquiries` - Contact Form Submissions
```php
- id: BIGINT
- name: VARCHAR(255)
- email: VARCHAR(255)
- phone: VARCHAR(20) NULL
- topic: VARCHAR(120) NULL - Subject
- message: TEXT - Inquiry content
- timestamps
```

#### 5. `faculty_profiles` - Teacher Directory
```php
- id: BIGINT
- name: VARCHAR(255)
- designation: VARCHAR(120) - e.g., "Asst. Professor"
- department: VARCHAR(120) - Department name
- qualification: VARCHAR(150) NULL - e.g., "PhD, M.Sc."
- specialization: VARCHAR(150) NULL - Research area
- experience_years: TINYINT DEFAULT 0
- email: VARCHAR(255) NULL
- phone: VARCHAR(20) NULL
- photo_path: VARCHAR(255) NULL - Image storage
- display_order: INT DEFAULT 0
- is_active: BOOLEAN DEFAULT true
- timestamps
- INDEX on (is_active, display_order)
```

#### 6. `departments` - College Departments
```php
- id: BIGINT
- name: VARCHAR(255) - e.g., "Physics"
- code: VARCHAR(15) UNIQUE - e.g., "PHY"
- about: LONGTEXT NULL - Description
- established_year: YEAR NULL - When founded
- research_center: BOOLEAN DEFAULT false
- logo_path: VARCHAR(255) NULL
- hod_faculty_id: BIGINT NULL - Head of department
- timestamps
- FOREIGN KEY on hod_faculty_id -> faculty(id)
```

#### 7. Core Tables Migration (2026_04_13_000001)
Creates additional tables:
- `programs` - Academic programs (UG/PG/Integrated)
- `faculty` - Faculty linked to users
- `students` - Student records linked to users
- `admissions` - CAP admission records
- `results` - Exam results and marks
- `notices` - College announcements
- `events` - Campus events
- `placements` - Job placement records
- `gallery_items` - Photo gallery entries

---

## Models

All models located in `app/Models/`:

### 1. User Model (`User.php`)
```php
protected $fillable = [
    'name', 'email', 'password', 'role',
    'department_id', 'is_active', 'email_verified_at'
];

protected $hidden = ['password', 'remember_token'];

protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
    'is_active' => 'boolean',
];
```

### 2. AdmissionApplication Model (`AdmissionApplication.php`)
```php
protected $fillable = [
    'application_id', 'full_name', 'dob', 'gender',
    'category', 'religion', 'phone', 'email', 'address',
    'school', 'board', 'pass_year', 'subject_combo',
    'percentage', 'pref1', 'pref2', 'pref3',
    'doc_marksheet_path', 'doc_tc_path', 'doc_community_path',
    'status', 'remarks'
];

protected $casts = [
    'dob' => 'date',
    'pass_year' => 'integer',
    'percentage' => 'decimal:2',
];
```

### 3. ContactInquiry Model (`ContactInquiry.php`)
```php
protected $fillable = [
    'name', 'email', 'phone', 'topic', 'message'
];
```

### 4. Department Model (`Department.php`)
```php
protected $fillable = [
    'name', 'code', 'about', 'established_year',
    'research_center', 'logo_path'
];

protected $casts = [
    'research_center' => 'boolean',
    'established_year' => 'integer',
];

// Accessor: Auto-generates slug from name
public function getSlugAttribute(): string
```

### 5. FacultyProfile Model (`FacultyProfile.php`)
```php
protected $fillable = [
    'name', 'designation', 'department', 'qualification',
    'specialization', 'experience_years', 'email', 'phone',
    'photo_path', 'display_order', 'is_active'
];

protected $casts = [
    'experience_years' => 'integer',
    'display_order' => 'integer',
    'is_active' => 'boolean',
];
```

### 6. HomeSlider Model (`HomeSlider.php`)
```php
protected $fillable = [
    'title', 'caption', 'image_path', 'alt_text',
    'display_order', 'is_active', 'uploaded_by'
];

protected $casts = [
    'is_active' => 'boolean',
    'display_order' => 'integer',
];

// Scope: Only get active slides
public function scopeActive(Builder $query): Builder
```

---

## Controllers

### Public Controllers (Accessible to Everyone)

#### HomeController (`app/Http/Controllers/HomeController.php`)
```php
public function index()
└─> Shows homepage with:
    - Active slides from home_sliders table
    - Fallback images if no slides
    - Testimonials array
    - Statistics counters

private function getActiveSlides(): Collection
└─> Returns slides ordered by display_order
   Falls back to empty collection if table missing
```

#### AdmissionController (`app/Http/Controllers/AdmissionController.php`)
```php
public function index()
└─> Shows admissions info page

public function create()
└─> Shows application form (/admissions/apply)

public function store(Request $request)
└─> Processes application submission:
    1. Validates 20+ form fields
    2. Validates PDF uploads (max 5MB each)
    3. Generates unique SGC2026#### ID
    4. Stores files in storage/app/public/admissions/documents/
    5. Creates database record
    6. Redirects with success + application ID

public function status(Request $request, ?string $id = null)
└─> Shows application status lookup:
    - Accepts ID from URL or query string
    - Queries admission_applications table
    - Displays current status

private function generateApplicationId(): string
└─> Creates unique ID format: SGC{YEAR}{4-digit-random}
   Checks uniqueness before returning
```

#### ContactController (`app/Http/Controllers/ContactController.php`)
```php
public function index()
└─> Shows contact form page

public function send(Request $request)
└─> Processes contact form:
    1. Validates: name, email, phone, topic, message
    2. Validates captcha confirmation
    3. Saves to contact_inquiries table
    4. Redirects with success message
```

#### DepartmentController (`app/Http/Controllers/DepartmentController.php`)
```php
public function index()
└─> Lists all departments:
    - Checks if departments table exists
    - Fetches from database if available
    - Falls back to hardcoded 15 departments
    - Maps programs for each department

public function show(string $slug)
└─> Shows individual department:
    - Finds department by slug
    - Returns 404 if not found

private function getDepartments(): Collection
└─> Returns all departments with:
    - name, slug, code, programs, summary
    - research_center flag
    - established_year

private function programsFor(string $departmentName): string
└─> Maps department names to program listings
   e.g., "Physics" → "B.Sc., M.Sc."

private function fallbackDepartments(): array
└─> Hardcoded 15 departments as backup
```

#### FacultyController (`app/Http/Controllers/FacultyController.php`)
```php
public function index()
└─> Shows faculty directory:
    - Checks if faculty_profiles table exists
    - Fetches active profiles, ordered by display_order
    - Falls back to 6 sample faculty members

public function show(int $id)
└─> Shows individual faculty profile

private function getFacultyMembers(): Collection
└─> Returns faculty with fallback data
```

### Admin Controllers (Requires Authentication + Admin Role)

#### Admin/HomeSliderController (`app/Http/Controllers/Admin/HomeSliderController.php`)
```php
public function index()
└─> Lists all homepage slides for management

public function store(Request $request)
└─> Adds new slide:
    - Validates: title, caption, alt_text, display_order, is_active, image
    - Accepts: jpg, jpeg, png, webp (max 5MB)
    - Stores image in storage/app/public/home-sliders/
    - Creates database record
    - Redirects with success message

public function destroy(int $id)
└─> Removes slide:
    - Finds slide by ID
    - Deletes image file from storage
    - Deletes database record
```

#### Admin/DepartmentController (`app/Http/Controllers/Admin/DepartmentController.php`)
```php
public function index(): View
└─> Lists all departments with table existence check

public function store(Request $request): RedirectResponse
└─> Creates new department with validation:
    - name: required, max 255
    - code: required, max 15
    - about: optional text
    - established_year: 4 digits, 1900-2100
    - research_center: boolean

public function update(Request $request, Department $department)
└─> Modifies existing department

public function destroy(Department $department)
└─> Deletes department
```

#### Admin/FacultyController (`app/Http/Controllers/Admin/FacultyController.php`)
```php
public function index(): View
└─> Lists faculty profiles

public function store(Request $request): RedirectResponse
└─> Creates faculty profile:
    - Validates 10+ fields
    - Handles photo upload (optional, max 2MB)
    - Stores photo in storage/app/public/faculty/photos/
    - Sets is_active based on checkbox

public function update(Request $request, FacultyProfile $faculty)
└─> Updates existing profile:
    - Replaces photo if new one uploaded
    - Updates all text fields

public function destroy(FacultyProfile $faculty)
└─> Deletes profile

private function validateRequest(Request $request, bool $updating = false): array
└─> Shared validation rules for create/update
```

#### Admin/InquiryController (`app/Http/Controllers/Admin/InquiryController.php`)
```php
public function index(): View
└─> Shows contact inquiries:
    - Checks if contact_inquiries table exists
    - Paginates results (20 per page)
    - Orders by newest first

public function destroy(ContactInquiry $inquiry): RedirectResponse
└─> Deletes inquiry after admin responds
```

---

## Routes

Complete URL mapping from `routes/web.php`:

### Public Routes (No Login Required)

```php
// Static Pages
GET  /                    → HomeController@index           (home)
GET  /about               → PageController@about           (about)
GET  /history             → PageController@history           (history)
GET  /facilities          → PageController@facilities      (facilities)
GET  /student-life        → View: student-life             (student-life)

// Academic Info
GET  /academics           → AcademicsController@index      (academics.index)
GET  /departments         → DepartmentController@index     (departments.index)
GET  /departments/{slug} → DepartmentController@show      (departments.show)
GET  /programs            → ProgramController@index        (programs.index)

// Admissions
GET  /admissions         → AdmissionController@index        (admissions.index)
GET  /admissions/apply   → AdmissionController@create       (admissions.apply)
POST /admissions/apply   → AdmissionController@store        (admissions.store)
GET  /admissions/status/{id?} → AdmissionController@status (admissions.status)

// Other Info
GET  /placements         → PlacementController@index        (placements.index)
GET  /notices            → NoticeController@index           (notices.index)
GET  /events             → EventController@index            (events.index)
GET  /faculty            → FacultyController@index          (faculty.index)
GET  /gallery            → GalleryController@index          (gallery.index)

// Contact
GET  /contact            → ContactController@index          (contact.index)
POST /contact            → ContactController@send           (contact.send)
```

### Authenticated Routes (Login Required)

```php
GET  /dashboard          → Role-based redirect
GET  /profile            → ProfileController@edit           (profile.edit)
PATCH /profile           → ProfileController@update         (profile.update)
DELETE /profile          → ProfileController@destroy          (profile.destroy)
```

### Admin Routes (`/admin/*`, Requires super_admin or dept_admin)

```php
GET    /admin/dashboard          → Admin\DashboardController@index  (admin.dashboard)

// Home Sliders
GET    /admin/home-sliders       → Admin\HomeSliderController@index  (admin.home-sliders.index)
POST   /admin/home-sliders       → Admin\HomeSliderController@store   (admin.home-sliders.store)
DELETE /admin/home-sliders/{id}  → Admin\HomeSliderController@destroy (admin.home-sliders.destroy)

// Departments
GET    /admin/departments        → Admin\DepartmentController@index   (admin.departments.index)
POST   /admin/departments        → Admin\DepartmentController@store   (admin.departments.store)
PATCH  /admin/departments/{department} → Admin\DepartmentController@update  (admin.departments.update)
DELETE /admin/departments/{department} → Admin\DepartmentController@destroy (admin.departments.destroy)

// Faculty
GET    /admin/faculty           → Admin\FacultyController@index      (admin.faculty.index)
POST   /admin/faculty           → Admin\FacultyController@store      (admin.faculty.store)
PATCH  /admin/faculty/{faculty}  → Admin\FacultyController@update     (admin.faculty.update)
DELETE /admin/faculty/{faculty}  → Admin\FacultyController@destroy    (admin.faculty.destroy)

// Contact Inquiries
GET    /admin/inquiries         → Admin\InquiryController@index      (admin.inquiries.index)
DELETE /admin/inquiries/{inquiry} → Admin\InquiryController@destroy   (admin.inquiries.destroy)
```

### Faculty Routes (`/faculty-portal/*`, Requires faculty role)

```php
GET /faculty-portal/dashboard → Faculty\DashboardController@index (faculty.dashboard)
```

### Student Routes (`/student/*`, Requires student role)

```php
GET /student/dashboard → Student\DashboardController@index (student.dashboard)
```

### Authentication Routes (from `routes/auth.php`)

```php
// Guest-only (not logged in)
GET  /register           → Auth\RegisteredUserController@create    (register)
POST /register           → Auth\RegisteredUserController@store
GET  /login              → Auth\AuthenticatedSessionController@create (login)
POST /login              → Auth\AuthenticatedSessionController@store
GET  /forgot-password    → Auth\PasswordResetLinkController@create   (password.request)
POST /forgot-password    → Auth\PasswordResetLinkController@store    (password.email)
GET  /reset-password/{token} → Auth\NewPasswordController@create    (password.reset)
POST /reset-password     → Auth\NewPasswordController@store       (password.store)

// Authenticated only
GET  /verify-email       → Auth\EmailVerificationPromptController   (verification.notice)
GET  /verify-email/{id}/{hash} → Auth\VerifyEmailController         (verification.verify)
POST /email/verification-notification → Auth\...                    (verification.send)
GET  /confirm-password   → Auth\ConfirmablePasswordController@show   (password.confirm)
POST /confirm-password  → Auth\ConfirmablePasswordController@store
PUT  /password          → Auth\PasswordController@update            (password.update)
POST /logout           → Auth\AuthenticatedSessionController@destroy (logout)
```

---

## Views

All views located in `resources/views/` using Blade template engine:

### Layout Templates (`resources/views/layouts/`)

| File | Purpose |
|------|---------|
| `frontend.blade.php` | Main website layout with navigation, header, footer |
| `app.blade.php` | Dashboard layout for logged-in users |
| `guest.blade.php` | Minimal layout for login/register pages |
| `navigation.blade.php` | Top navigation bar component |

### Public Pages

| File | Route | Description |
|------|-------|-------------|
| `home.blade.php` | `/` | Homepage with hero slider, stats, events |
| `about.blade.php` | `/about` | College about page |
| `history.blade.php` | `/history` | College history |
| `facilities.blade.php` | `/facilities` | Campus facilities |
| `student-life.blade.php` | `/student-life` | Student activities |

### Admin Views (`resources/views/admin/`)

| File | Purpose |
|------|---------|
| `dashboard.blade.php` | Admin dashboard overview |
| `home-sliders/index.blade.php` | Manage homepage images |
| `departments/index.blade.php` | Manage departments |
| `faculty/index.blade.php` | Manage faculty profiles |
| `inquiries/index.blade.php` | View contact form submissions |

### Admission Views (`resources/views/admissions/`)

| File | Route | Purpose |
|------|-------|---------|
| `index.blade.php` | `/admissions` | Admission info page |
| `apply.blade.php` | `/admissions/apply` | **Full application form** |
| `status.blade.php` | `/admissions/status` | Application lookup |

---

## User Roles & Permissions

### Role Hierarchy

```
┌─────────────────────────────────────────────────────────┐
│                   ROLE PERMISSIONS                     │
├─────────────────────────────────────────────────────────┤
│                                                         │
│  🔴 SUPER_ADMIN (Gouri Parvathy)                        │
│     ├─ Full system access                              │
│     ├─ Manage all users                                │
│     ├─ Manage home sliders                             │
│     ├─ Manage departments                              │
│     ├─ Manage faculty                                  │
│     ├─ View all inquiries                              │
│     ├─ Create/edit/delete everything                   │
│     └─ Access to /admin/*                              │
│                                                         │
│  🟠 DEPT_ADMIN                                          │
│     ├─ Manage own department                            │
│     ├─ Manage department faculty                        │
│     ├─ Post department notices                          │
│     ├─ View department students                         │
│     └─ Access to /admin/* (limited scope)              │
│                                                         │
│  🟡 FACULTY                                             │
│     ├─ View own classes                                 │
│     ├─ Upload materials                                 │
│     ├─ Mark attendance                                  │
│     ├─ Enter exam results                               │
│     ├─ Edit own profile                                 │
│     └─ Access to /faculty-portal/*                      │
│                                                         │
│  🟢 STUDENT                                             │
│     ├─ View own results                                 │
│     ├─ View fee status                                  │
│     ├─ Download materials                               │
│     ├─ View timetable                                   │
│     ├─ Read notices                                     │
│     ├─ Request services                                 │
│     ├─ Edit own profile                                 │
│     └─ Access to /student/*                             │
│                                                         │
│  ⚪ PUBLIC (Not logged in)                              │
│     ├─ View all public pages                            │
│     ├─ Submit admission application                     │
│     ├─ Submit contact form                              │
│     ├─ Check admission status                           │
│     └─ No dashboard access                              │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

### Default Admin Account

```php
// Created by AdminUserSeeder.php
Email: gouriparvathy32@gmail.com
Password: admin@123
Role: super_admin
Name: Gouri Parvathy
```

---

## File Storage System

### Storage Configuration

Uses Laravel's Storage facade with `public` disk:
```php
'disks' => [
    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'/storage',
    ],
]
```

### Upload Directories

```
storage/app/public/
│
├── admissions/
│   └── documents/           # Admission application PDFs
│       ├── marksheet_abc123.pdf
│       ├── tc_def456.pdf
│       └── community_ghi789.pdf
│
├── faculty/
│   └── photos/              # Faculty profile pictures
│       ├── photo_john.jpg
│       └── photo_jane.png
│
└── home-sliders/            # Homepage carousel images
    ├── slide_001.jpg
    ├── slide_002.png
    └── slide_003.webp
```

### File Upload Validation

| Feature | Accepted Types | Max Size |
|---------|---------------|----------|
| Admission Marksheet | PDF | 5 MB |
| Admission TC | PDF | 5 MB |
| Admission Community | PDF (optional) | 5 MB |
| Faculty Photo | jpg, jpeg, png, webp | 2 MB |
| Home Slider | jpg, jpeg, png, webp | 5 MB |

---

## Deployment Options

### 1. Vercel Deployment (Serverless)

**Config:** `vercel.json`

```json
{
  "buildCommand": "npm run build",
  "outputDirectory": "public",
  "functions": {
    "api/index.php": {
      "runtime": "vercel-php@0.9.0",
      "maxDuration": 30
    }
  },
  "routes": [
    {"src": "/assets/(.*)", "dest": "/public/assets/$1"},
    {"src": "/build/(.*)", "dest": "/public/build/$1"},
    {"src": "/(.*)", "dest": "/api/index.php"}
  ]
}
```

**Command:** `composer run vercel`

### 2. Docker Deployment

**Config:** `Dockerfile`

```dockerfile
FROM richarvey/nginx-php-fpm:3.1.6
COPY . .
RUN apk add --no-cache nodejs npm \
    && npm ci \
    && npm run build \
    && rm -rf node_modules
ENV WEBROOT /var/www/html/public
ENV APP_ENV production
```

### 3. Traditional Hosting

**Requirements:**
- PHP 8.2+
- SQLite extension enabled
- Apache/Nginx with rewrite rules
- Node.js for asset building

**Server.php** handles static files and routes to `public/index.php`

---

## How Data Flows

### Example 1: Submitting Admission Application

```
1. BROWSER → GET /admissions/apply
   └─> Returns apply.blade.php with form

2. USER FILLS FORM → POST /admissions/apply
   │
   ▼
3. routes/web.php → AdmissionController@store
   │
   ▼
4. CONTROLLER VALIDATES:
   ├─ full_name: required, max 255
   ├─ email: required, valid email
   ├─ phone: required
   ├─ doc_marksheet: required, PDF, max 5MB
   ├─ doc_tc: required, PDF, max 5MB
   └─ declaration_confirmed: accepted
   │
   ▼
5. GENERATES ID → SGC20261048
   │
   ▼
6. STORES FILES:
   ├─ doc_marksheet → storage/app/public/admissions/documents/
   ├─ doc_tc → storage/app/public/admissions/documents/
   └─ doc_community → storage/app/public/admissions/documents/ (if provided)
   │
   ▼
7. CREATES DATABASE RECORD:
   INSERT INTO admission_applications (...)
   │
   ▼
8. REDIRECTS WITH SUCCESS MESSAGE
   "Application submitted successfully. Your ID is SGC20261048."
```

### Example 2: Admin Viewing Contact Inquiries

```
1. ADMIN LOGS IN → Authenticated, role: super_admin
   │
   ▼
2. BROWSER → GET /admin/inquiries
   │
   ▼
3. routes/web.php (auth + role middleware)
   → Admin\InquiryController@index
   │
   ▼
4. CONTROLLER:
   ├─ Checks if contact_inquiries table exists
   ├─ Queries: ContactInquiry::latest()->paginate(20)
   └─ Passes to view: admin.inquiries.index
   │
   ▼
5. VIEW DISPLAYS:
   ├─ Table of inquiries (20 per page)
   ├─ Pagination links
   └─ Delete button for each inquiry
```

---

## Key Concepts Explained

### MVC Pattern (Model-View-Controller)

Think of a restaurant:

| MVC Component | Restaurant Analogy | In This Project |
|---------------|---------------------|-----------------|
| **Model** | Kitchen/Chef | `AdmissionApplication.php` - Knows how to store/retrieve application data |
| **View** | Plates/Presentation | `apply.blade.php` - Displays the form beautifully |
| **Controller** | Waiter | `AdmissionController.php` - Takes requests, coordinates between Model and View |

### Middleware (Security Guards)

```php
// Example from routes/web.php
Route::middleware(['auth', 'role:super_admin,dept_admin'])->group(function () {
    // These routes require:
    // 1. User must be logged in (auth)
    // 2. User must have role super_admin OR dept_admin (role)
});
```

### Eloquent ORM (Database Interaction)

```php
// Instead of writing SQL:
$applications = DB::select("SELECT * FROM admission_applications WHERE status = 'pending'");

// We write clean PHP:
$applications = AdmissionApplication::where('status', 'pending')->get();
```

### Blade Templating (PHP + HTML)

```blade
@extends('layouts.frontend')

@section('content')
    <h1>Welcome, {{ $user->name }}</h1>
    
    @if($applications->count() > 0)
        @foreach($applications as $app)
            <p>Application {{ $app->application_id }}</p>
        @endforeach
    @else
        <p>No applications found.</p>
    @endif
@endsection
```

---

## Available Commands

### Composer Scripts (defined in `composer.json`)

```bash
# Full setup (install dependencies, create DB, build assets)
composer run setup

# Development (runs 4 processes: server, queue, logs, vite)
composer run dev

# Run tests
composer run test

# Vercel deployment build
composer run vercel
```

### Artisan Commands (Laravel CLI)

```bash
# Create database tables
php artisan migrate

# Add sample data
php artisan db:seed

# Create specific seeder
php artisan db:seed --class=AdminUserSeeder

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan cache:clear

# Start development server
php artisan serve

# Check routes
php artisan route:list
```

### NPM Scripts

```bash
# Development build with hot reload
npm run dev

# Production build
npm run build
```

---

## File Location Quick Reference

| To Find/Modify... | Look In... |
|-------------------|------------|
| **Homepage content** | `resources/views/home.blade.php` |
| **Navigation menu** | `resources/views/layouts/frontend.blade.php` |
| **CSS styling** | `public/assets/css/styles.css` |
| **Homepage slider logic** | `app/Http/Controllers/HomeController.php` |
| **Admission form processing** | `app/Http/Controllers/AdmissionController.php` |
| **Admin panel layout** | `resources/views/admin/dashboard.blade.php` |
| **Database structure** | `database/migrations/` |
| **Add default admin** | `database/seeders/AdminUserSeeder.php` |
| **Add new URL** | `routes/web.php` |
| **Change user roles** | `app/Models/User.php` (role fillable) |
| **Uploaded files** | `storage/app/public/` |

---

## Troubleshooting Guide

### Common Issues

| Problem | Solution |
|---------|----------|
| "Table not found" error | Run `php artisan migrate` |
| 404 on all pages | Check `mod_rewrite` is enabled (Apache) |
| CSS not loading | Run `npm run build` |
| Can't upload files | Check `storage/app/public` permissions (755) |
| Images not showing | Run `php artisan storage:link` |
| Database locked | Delete `database/database.sqlite` and re-migrate |

---

## Summary Statistics

```
PROJECT OVERVIEW:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📁 Total Directories:     80+
📄 Total Files:           200+
💾 Database Tables:       8 created, 5 active
🎨 Blade Templates:       30+
🎮 Controllers:           30+
📊 Models:                6
🛣️  Routes:               50+
📦 PHP Packages:          12
🔧 JS Packages:           8

KEY FEATURES:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ Public website with 15+ pages
✅ Online admission with document upload
✅ Contact form with admin management
✅ Dynamic faculty directory
✅ Department management
✅ Homepage image carousel
✅ Role-based authentication (5 roles)
✅ Admin dashboard with full CRUD
✅ SQLite database (zero-config)
✅ Responsive design (mobile-friendly)
✅ Docker & Vercel deployment ready

DEFAULT LOGIN:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Email:    gouriparvathy32@gmail.com
Password: admin@123
Role:     super_admin
```

---

*Documentation for St. George's College Aruvithura Management System*
*Last Updated: April 2026*
