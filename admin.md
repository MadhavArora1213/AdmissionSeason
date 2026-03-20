# EduSearch Admin & Operations Panel Guide

This document defines the architecture, pages, and operational workflows for the **EduSearch Admin Dashboard**. This panel is the "Brain" of the platform, used by the internal team to manage data, moderate community content, and oversee B2B revenue.

---

## **1. Core Dashboard (Command Center)**
The landing page for admins providing a "Pulse Check" of the entire ecosystem.
- **Key Metrics (Real-time):**
  - **Engagement:** Total daily active users (DAU), search queries vs. AI counseling requests.
  - **Inventory:** Number of verified vs. unverified colleges, active kurses, and upcoming exams.
  - **Revenue:** CPL revenue today, pending invoices, and successful application fees.
  - **Integrity:** Pending reviews for moderation and suspicious lead alerts.
- **System Status Bar:** VPS RAM/CPU usage, Ollama model status, and MeiliSearch index health.

---

## **2. Entity Management (The Data Engine)**
Managing the system of record for the Indian education landscape.

### **2.1 College & Course Management**
*Powered by NocoDB for Spreadsheet-like speed.*
- **Action:** Add/Edit/Archive college profiles.
- **Fields:** Contact details, NAAC/NIRF metadata, accreditation proofs, and campus facilities.
- **Bulk Operations:** CSV/JSON import for batch updates of fees or placement stats.
- **Course Mapping:** Assigning entrance exams and specializations to specific college courses.

### **2.2 Exam & Cutoff Database**
- **Exam Profiles:** Managing dates, application links, and syllabus PDFs for 350+ exams.
- **Cutoff Manager:** Updating year-wise, category-wise (General/OBC/SC/ST) opening and closing ranks.
- **Rank Predictor Logic:** Testing and adjusting the percentile-to-college matching algorithms.

### **2.3 Scholarship & Financial Aid**
- **Directory:** Managing 150+ govt and private scholarships.
- **Eligibility Rules:** Configuring income limits and merit thresholds for the auto-finder tool.

---

## **3. Content & Community Moderation**
Maintaining high trust levels and preventing platform manipulation.

### **3.1 Review Moderation Queue**
*The most critical daily operation.*
- **Operation:** Every review submitted by a student remains "Pending" until admin approval.
- **Verification Check:** View uploaded Student IDs or verify the institutional email used for the review.
- **AI-Assisted Audit:** See the Llama-generated sentiment (Positive/Negative) and quality score.
- **Anti-Fraud:** Flag reviews coming from the same IP address or device ID.

### **3.2 Q&A and Community Forum**
- **Action:** Moderate student questions and responses on college profiles.
- **Expert Verification:** Verifying "Alumni" or "Faculty" badges for users providing answers.

---

## **4. B2B & Revenue Operations**
Managing the relationship with paying college clients.

### **4.1 Lead Management & Audit**
- **Monitoring:** Periodic audits of leads delivered via Brevo to ensure high quality scores.
- **Dispute Resolution:** Handling college claims of "Invalid Lead" (e.g., wrong phone number) and issuing credits.
- **Performance Analytics:** Viewing which colleges are getting the most ROI (impressions-to-lead ratio).

### **4.2 Subscription & Sponsorship Manager**
- **Ad Inventory:** Controlling which colleges appear in the "Featured" slots on search results.
- **Billing:** Tracking current CPL balances and automated monthly invoice generation.
- **Verification Workflow:** Reviewing UGC/AICTE certificates uploaded by colleges claiming their profiles.

---

## **5. User & Security Management**
- **Student Accounts:** Managing user profiles, suspending bots, or resetting credentials.
- **College Admin Permissions:** Assigning "Claimed" status to colleges once their marketing teams sign up.
- **Access Control (RBAC):** Defining permissions for internal team members (e.g., Data Entry vs. Super Admin).

---

## **6. Technical Operations (Ops & Maintenance)**

### **6.1 Scraper Dashboard**
- **Manage Jobs:** Control Puppeteer scripts that scrape NIRF, NAAC, and official college websites.
- **Data Delta:** See what changed (e.g., "MIT Pune updated their fees from 1.8L to 2.1L").
- **Error Logs:** Monitor if any college website blocked the scraper.

### **6.2 Infrastructure Observability**
- **Grafana Integration:** Embedded dashboards for:
  - **MySQL Performance:** Slow query logs and connection pool status.
  - **Redis Cache:** Hit rate for AI counselor responses.
  - **Ollama Inference:** Response times for Llama 3.1 8B model.
- **Sentry Alerts:** Real-time view of frontend/backend code crashes.

### **6.3 Backup & Recovery**
- **Operation:** Trigger manual MySQL dumps or verify the daily Cloudflare R2 backup status.
- **MeiliSearch Re-indexing:** Tool to force-sync MySQL data into the search engine index.

---

## **7. SEO Panel**
- **Metadata Manager:** Overriding auto-generated meta titles and descriptions for specific high-traffic pages.
- **Programmatic Page Control:** Monitoring the 90,000+ auto-generated pages for indexing errors.
- **Sitemap Generator:** Manually triggering sitemap updates for Google Search Console.
