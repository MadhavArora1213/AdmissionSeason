-- --- FULL EDUSEARCH SCHEMA (CLEAN VERSION) ---

-- 1. Users & Profiles
CREATE TABLE IF NOT EXISTS `users` (
  `id` VARCHAR(36) PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `phone` VARCHAR(20) UNIQUE,
  `password_hash` VARCHAR(255),
  `role` ENUM('STUDENT', 'COLLEGE_ADMIN', 'SUPER_ADMIN') DEFAULT 'STUDENT',
  `email_verified` BOOLEAN DEFAULT FALSE,
  `image_url` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `student_profiles` (
  `user_id` VARCHAR(36) PRIMARY KEY,
  `stream` VARCHAR(50),
  `class_10_marks` DECIMAL(5,2),
  `class_12_marks` DECIMAL(5,2),
  `preferred_cities` JSON,
  `budget_min` INT,
  `budget_max` INT,
  `career_goals` TEXT,
  `counseling_points` INT DEFAULT 0,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- 2. Colleges & Registry
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` VARCHAR(36) PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) UNIQUE NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `state` VARCHAR(100) NOT NULL,
  `established_year` INT,
  `type` ENUM('PRIVATE', 'GOVERNMENT', 'DEEMED', 'AUTONOMOUS') NOT NULL,
  `campus_area` VARCHAR(50),
  `naac_grade` VARCHAR(10),
  `approval_bodies` VARCHAR(255),
  `about_description` TEXT,
  `admission_process` TEXT,
  `logo_url` TEXT,
  `banner_url` TEXT,
  `brochure_pdf_url` TEXT,
  `video_tour_url` TEXT,
  `is_verified` BOOLEAN DEFAULT FALSE,
  `is_sponsored` BOOLEAN DEFAULT FALSE,
  `claimed_by_user_id` VARCHAR(36),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`claimed_by_user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
);

-- 3. Courses, Exams & Cutoffs
CREATE TABLE IF NOT EXISTS `courses` (
  `id` VARCHAR(36) PRIMARY KEY,
  `college_id` VARCHAR(36) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `stream` VARCHAR(100) NOT NULL,
  `specialization` VARCHAR(150),
  `degree_level` VARCHAR(50) NOT NULL,
  `study_mode` ENUM('FULL_TIME', 'PART_TIME', 'DISTANCE', 'ONLINE') DEFAULT 'FULL_TIME',
  `duration_years` DECIMAL(3,1) NOT NULL,
  `total_fees` INT NOT NULL,
  `first_year_fees` INT,
  `eligibility_criteria` TEXT,
  `seats_available` INT,
  `syllabus_pdf_url` TEXT,
  `course_description` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`college_id`) REFERENCES `colleges`(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `exams` (
  `id` VARCHAR(36) PRIMARY KEY,
  `name` VARCHAR(50) UNIQUE NOT NULL,
  `slug` VARCHAR(100) UNIQUE NOT NULL,
  `full_name` VARCHAR(255),
  `level` ENUM('NATIONAL', 'STATE', 'UNIVERSITY') NOT NULL,
  `mode` VARCHAR(50),
  `exam_date` DATE,
  `result_date` DATE,
  `application_link` TEXT
);

CREATE TABLE IF NOT EXISTS `cutoffs` (
  `id` VARCHAR(36) PRIMARY KEY,
  `course_id` VARCHAR(36) NOT NULL,
  `exam_id` VARCHAR(36) NOT NULL,
  `year` INT NOT NULL,
  `category` ENUM('GENERAL', 'OBC-NCL', 'SC', 'ST', 'EWS', 'PWD') NOT NULL,
  `quota` VARCHAR(50),
  `counseling_round` VARCHAR(50),
  `cutoff_type` ENUM('RANK', 'SCORE', 'PERCENTILE') NOT NULL,
  `opening_value` DECIMAL(10,2),
  `closing_value` DECIMAL(10,2),
  `is_expected` BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`exam_id`) REFERENCES `exams`(`id`) ON DELETE CASCADE
);

-- 4. Leads & Revenue
CREATE TABLE IF NOT EXISTS `leads` (
  `id` VARCHAR(36) PRIMARY KEY,
  `student_id` VARCHAR(36),
  `college_id` VARCHAR(36) NOT NULL,
  `student_name` VARCHAR(255) NOT NULL,
  `student_phone` VARCHAR(20) NOT NULL,
  `student_email` VARCHAR(255) NOT NULL,
  `course_interest` VARCHAR(255),
  `city` VARCHAR(100),
  `quality_score` ENUM('HIGH', 'MEDIUM', 'LOW') DEFAULT 'MEDIUM',
  `status` ENUM('NEW', 'CONTACTED', 'CONVERTED', 'JUNK') DEFAULT 'NEW',
  `source_page` VARCHAR(255),
  `utm_source` VARCHAR(100),
  `utm_medium` VARCHAR(100),
  `utm_campaign` VARCHAR(100),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`student_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`college_id`) REFERENCES `colleges`(`id`) ON DELETE CASCADE
);

-- 5. Reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` VARCHAR(36) PRIMARY KEY,
  `college_id` VARCHAR(36) NOT NULL,
  `student_id` VARCHAR(36) NOT NULL,
  `academic_rating` DECIMAL(3,1),
  `faculty_rating` DECIMAL(3,1),
  `infrastructure_rating` DECIMAL(3,1),
  `accommodation_rating` DECIMAL(3,1),
  `placement_rating` DECIMAL(3,1),
  `social_life_rating` DECIMAL(3,1),
  `overall_rating` DECIMAL(3,2),
  `batch_year` INT NOT NULL,
  `course_id` VARCHAR(36),
  `admission_year` INT,
  `title` VARCHAR(255) NOT NULL,
  `course_curriculum_review` TEXT,
  `faculty_review` TEXT,
  `campus_life_review` TEXT,
  `placement_review` TEXT,
  `admission_process_review` TEXT,
  `fees_and_financial_aid_review` TEXT,
  `pros` TEXT,
  `cons` TEXT,
  `status` ENUM('PENDING', 'APPROVED', 'REJECTED') DEFAULT 'PENDING',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`college_id`) REFERENCES `colleges`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`student_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);
