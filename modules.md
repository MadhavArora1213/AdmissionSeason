# EduSearch Platform: Modules & Architecture Overview

This document provides a detailed breakdown of all functional modules, screens, and core components of the EduSearch platform.

---

## **1. Student-Facing Modules (Discovery & Admissions)**

The student-facing application is built with **Next.js 14** (App Router) for high SEO performance and a premium user experience.

### **Module 1: College Discovery & Smart Search**
*The entry point for students to find their ideal institution.*
- **Core Screens:**
  - **Homepage:** Features a global search bar, category chips (Engineering, MBA, etc.), and featured colleges.
  - **College Listing Page:** A high-performance search interface with a multi-filter sidebar.
- **Key Features:**
  - **Instant Search:** Powered by MeiliSearch for typo-tolerant, sub-100ms results.
  - **Dynamic Filters:** State, City, Fees range (slider), NAAC Grade, NIRF Rank, and Entrance Exams.
  - **Map View:** Interactive Google Maps integration showing college locations.
  - **Smart Suggestion Chips:** Quick links like "Top MBA colleges in Delhi" or "NAAC A++ colleges".

### **Module 2: College Profile Pages**
*The "Deep Dive" into a specific college's offerings.*
- **Core Screens:**
  - **Header/Hero Area:** College banner, logo, and core badges (NIRF, NAAC).
  - **Tabbed Overview:**
    - **Overview:** UGC/AICTE approvals, facilities, and about section.
    - **Courses & Fees:** Matrix of all courses with detailed fee structures.
    - **Admission:** Process steps, important dates, and documents checklist.
    - **Placements:** Packages (Avg/High/Median) and top recruiter logos.
    - **Reviews:** Verified student ratings and sentiment analysis summaries.
    - **Gallery:** Photo grid of campus, hostel, and labs.
    - **Q&A:** Community-driven questions and verified answers.
- **Tools:** Sticky "Enquire Now" and "Apply Now" buttons.

### **Module 3: Exam Information Hub**
*A centralized database for over 350 entrance exams.*
- **Core Screens:**
  - **Exam Profile Page:** Syllabus, pattern, registration links, and accepting colleges.
  - **Exam Calendar:** Monthly view of application deadlines and exam dates.
- **Key Features:**
  - **Rank Predictor:** Enter scores/percentiles to see probable college cutoffs.
  - **Result Alerts:** Automated notifications for result declarations.

### **Module 4: AI Counseling Assistant**
*Personalized guidance powered by self-hosted Llama 3.1.*
- **Core Screens:**
  - **Chat Interface:** A WhatsApp-style bubble UI for natural language counseling.
- **Key Features:**
  - **Personalized Shortlisting:** AI analyzes marks, budget, and city preference to recommend top 3-5 colleges.
  - **Context-Aware Answers:** Handles follow-up questions about hostels, safety, and placements.
  - **Redis Caching:** Common queries are cached to save VPS resources.

### **Module 5: Direct Application & Tracker**
*End-to-end admissions workflow for partner colleges.*
- **Core Screens:**
  - **Application Form:** Multi-step form pre-filled from student profile.
  - **Document Vault:** Centralized space for marksheets and ID proofs.
  - **Tracking Dashboard:** Status updates (Under Review -> Shortlisted -> Admitted).
- **Key Features:**
  - **Razorpay Integration:** Payment of college application fees.

### **Module 6: Reviews & Student Community**
*Credibility and social proof layer.*
- **Key Features:**
  - **Verification Gate:** Reviews require college email OTP or student ID verification.
  - **5-Dimension Ratings:** Academic, Infrastructure, Faculty, Social, and Placement.
  - **Helpful Votes:** Peer-voted review surfacing.

### **Module 7: Study Abroad Module**
*International education discovery.*
- **Key Features:**
  - **500+ University Profiles:** Covering US, UK, Canada, Australia, etc.
  - **Currency Converter:** Real-time fee conversion to INR.
  - **Visa Guidance:** Country-specific checklists and timelines.

### **Module 8: Career & Salary Insights**
*Helping students judge the Return on Investment (ROI).*
- **Key Features:**
  - **ROI Calculator:** Maps total fees against expected 5-year salary.
  - **Industry Heatmap:** Shows demand trends for different streams.

### **Module 9: Scholarship & Loan Finder**
*Financial support discovery.*
- **Key Features:**
  - **Scholarship Search:** Filter by category (SC/ST/OBC), merit, or income.
  - **EMI Calculator:** Interactive loan planning tool.

### **Module 10: Student Dashboard**
*The central control center for the user.*
- **Core Screens:**
  - **Kanban Board:** Manage colleges (To Research -> Interested -> Applied).
  - **Document Repository:** One-time upload for reuse across applications.

---

## **2. B2B & Operations Modules**

### **Module 11: College B2B Portal**
*The interface for colleges to manage their presence and leads.*
- **Core Screens:**
  - **Dashboard:** At-a-glance stats on impressions and leads.
  - **Lead Inbox:** View/Filter student leads with quality scores.
  - **Profile Editor:** Self-serve tool to update fees, courses, and gallery.
- **Key Features:**
  - **Real-time Alerts:** Brevo SMS/Email triggers for new leads.
  - **Analytics Suite:** Conversion funnel and competitor comparison.

### **Module 12: Admin & Operations Panel**
*Full-platform management and system monitoring.*
- **Core Screens:**
  - **CMS (NocoDB):** CRUD operations on the 30,000+ college database.
  - **Moderation Queue:** Approve/Reject reviews and verify student identities.
  - **Revenue Dashboard:** Monitor CPL (Cost Per Lead) billing and subscriptions.
- **Key Features:**
  - **System Health:** Integrated Grafana dashboards for server metrics.
  - **Scraping Job Manager:** Control Puppeteer scripts for data enrichment.

---

## **3. Technical Architecture & Data Things**

### **Core Stack**
- **Frontend:** Next.js 14, Tailwind CSS, shadcn/ui.
- **Backend:** Node.js (Fastify framework), Prisma ORM.
- **Search Engine:** MeiliSearch (Primary search logic and NLP).
- **AI Engine:** Ollama with Llama 3.1 8B (Self-hosted on VPS).
- **Database:** MySQL 8.0 (Relational data of colleges, students, leads).
- **Caching:** Redis/Valkey (Sessions, rate limits, and AI response cache).

### **Infrastructure Components**
- **Reverse Proxy:** Nginx with Certbot for SSL.
- **File Storage:** Cloudflare R2 (S3-compatible) for images/PDFs.
- **Communication:** Brevo for Transactional SMS and Email.
- **Automation:** PM2 for process management and BullMQ for background tasks (lead delivery).

### **Data Flow**
1. **Search Request:** User input -> MeiliSearch -> Optimized JSON response.
2. **AI Counseling:** Student Profile + College Matches -> Llama 3.1 Prompt -> Streamed Response.
3. **Lead Flow:** Student Enquiry -> Fastify -> MySQL + BullMQ -> Brevo SMS/Email -> College.
