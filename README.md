**EduSearch Platform**

Complete Bootstrap Blueprint

*Self-Hosted AI  •  Zero Paid Tools  •  VPS-Only  •  30-Day Launch*

|**VPS**|**AI Model**|**Search**|**SMS**|**Email**|**Maps**|**Payments**|
| :- | :- | :- | :- | :- | :- | :- |
|Hostinger ₹648/mo|Ollama + Llama 3.1 8B (Free)|MeiliSearch (OSS)|Brevo 300/day Free|Brevo 300/day Free|Google Maps Free Tier|Razorpay (₹0 setup)|

*February 2026*


# **1. Platform Overview & Vision**
EduSearch is a next-generation education discovery and admissions platform — a single hub where students find colleges, compare courses, get AI-powered counseling, and complete their admission journey. Built to compete with and surpass Collegedunia, Shiksha, Careers360, and CollegeDekho — entirely on open-source tools and a single VPS.

Collegedunia earns ₹200 Cr+ annually with 20M+ monthly visitors yet suffers a 68% bounce rate and shallow engagement. Our platform fixes this with deeper AI personalization, a full admissions workflow, and a trust-first approach — at near-zero infrastructure cost.

## **Target Users**
**Primary — Students**

- Class 10–12 students researching colleges after boards
- UG students seeking PG admissions (MBA, M.Tech, MSc)
- Working professionals exploring MBA or upskilling programs
- NRI / international students wanting to study in India
- Indian students seeking study abroad opportunities

**Secondary — Parents**

- Parents tracking their child's options, fees, and scholarship eligibility
- Parents comparing college value-for-money and placement outcomes

**B2B Clients — Paying Customers**

- Private colleges and universities (primary revenue source)
- Ed-tech and coaching institutes wanting student leads
- Education loan companies and scholarship funds
- Study abroad consultancies and foreign universities


# **2. Infrastructure — VPS Setup & Resource Plan**
Your Hostinger VPS: 2 vCPU, 8 GB RAM, 100 GB NVMe, 8 TB bandwidth. Total cost: ₹15,548 upfront for 24 months (effective ₹648/month). Everything runs in Docker containers on this single server.

## **2.1 RAM Allocation Map**

|**Service**|**RAM Usage**|**Status**|**Notes**|
| :- | :- | :- | :- |
|Next.js App (Node)|~400 MB|✅ Always on|Build static pages where possible for SEO|
|Fastify API Server|~300 MB|✅ Always on|All API routes — leads, auth, search, CMS|
|MySQL 8.0|~500 MB|✅ Always on|Primary database for all relational data|
|MeiliSearch|~300 MB|✅ Always on|Full-text college search with filters|
|Redis (Valkey)|~120 MB|✅ Always on|Cache, sessions, rate limiting|
|Nginx + Certbot|~40 MB|✅ Always on|Reverse proxy + free SSL|
|Ollama + Llama 3.1 8B Q4|~5.5 GB|⚠️ On-demand|Loads when AI counselor called, frees RAM after|
|NocoDB (Admin Panel)|~150 MB|✅ Always on|Admin data management UI|
|Umami (Analytics)|~100 MB|✅ Always on|Privacy-first web analytics|
|TOTAL (Ollama idle)|~1.9 GB|✅ Comfortable|Plenty of headroom|
|TOTAL (Ollama active)|~7.4 GB|⚠️ Near limit|Acceptable — use Redis to cache AI responses|

**Key strategy:** Cache AI counselor responses in Redis (TTL 30 min) for common query patterns. 80% of student questions repeat — this slashes inference frequency dramatically.

## **2.2 Disk Usage Plan (100 GB NVMe)**

|**Data Type**|**Estimated Size**|
| :- | :- |
|MySQL (colleges, users, leads, reviews, exams)|~15–25 GB|
|MeiliSearch index (30,000+ college records)|~3–5 GB|
|Ollama model files (Llama 3.1 8B Q4\_K\_M)|~4.7 GB|
|College images & uploaded PDFs (via Cloudflare R2 CDN — not stored on VPS)|~0 GB on VPS|
|Redis data on disk|~500 MB|
|OS + Docker + App code|~8 GB|
|Logs + backups (compressed weekly)|~8 GB|
|TOTAL PROJECTED|~40–52 GB — well within 100 GB limit|

## **2.3 Docker Compose Architecture**
All services run as Docker containers. Nginx routes external traffic. Ollama, PostgreSQL, Redis, and MeiliSearch are internal-only (not exposed to internet).

\# Traffic flow on your VPS

INTERNET → Cloudflare CDN/WAF → Nginx (port 443/80)

`    `├── /             → nextjs:3000     (SSR + static pages)

`    `├── /api          → fastify:3001     (REST API)

`    `├── /admin        → nocodb:8080      (Admin panel — IP restricted)

`    `└── /analytics    → umami:3002       (Analytics dashboard)

\# Internal only (not public)

fastify ↔ mysql:3306  |  redis:6379  |  meilisearch:7700  |  ollama:11434


# **3. Self-Hosted AI — Ollama + Llama 3.1**
Instead of paying ₹50,000–₹2,00,000/month for commercial AI APIs, you self-host an open-source LLM on your VPS. Quality is highly acceptable for structured college counseling tasks.

## **3.1 Model Comparison**

|**Model**|**Disk Size (Q4)**|**RAM Needed**|**Speed on VPS**|**Recommended For**|
| :- | :- | :- | :- | :- |
|Llama 3.1 8B Instruct ✅|~4.7 GB|~5.5 GB|~3–8 sec/response|Primary AI counselor — best balance|
|Mistral 7B Instruct|~4.1 GB|~5.0 GB|~2–5 sec/response|Alternative — slightly faster|
|Phi-3 Mini 3.8B|~2.2 GB|~3.0 GB|~1–3 sec/response|Fallback — lower RAM, lower quality|
|Llama 3.1 70B|~40 GB|Not feasible|—|Needs GPU server — skip for now|

## **3.2 Installation on VPS**
\# Install Ollama

curl -fsSL https://ollama.com/install.sh | sh

\# Pull the recommended model (~4.7 GB download)

ollama pull llama3.1:8b-instruct-q4\_K\_M

\# Start Ollama service (localhost only — never expose to internet)

ollama serve  # runs on localhost:11434

\# Test it works

curl http://localhost:11434/api/generate -d '{"model":"llama3.1:8b-instruct-q4\_K\_M","prompt":"Hello"}'

## **3.3 AI Counselor Architecture**
The LLM does NOT query the database directly. Your Fastify backend does the database work, formats the top matching colleges, and injects them into the prompt. This is critical for accuracy, speed, and preventing hallucinations.

\# How each AI counseling request works:

1\. Student submits: marks=72%, budget=₹2L/yr, city=Pune, stream=Engineering

2\. Fastify queries MySQL → fetches top 10 matching colleges

3\. Fastify checks Redis → if same query cached, return cached response instantly

4\. If not cached → build prompt with college data → call Ollama API

5\. Stream Llama response back to student chat UI

6\. Cache response in Redis for 30 minutes

\# Example system prompt sent to Llama:

SYSTEM: You are EduSearch, an expert Indian college admission counselor.

Answer only based on the college data provided. Be concise and helpful.

USER: Student profile: 72% in PCM, budget ₹2L/year, prefers Pune or Mumbai.

Available colleges: [MIT Pune - fees ₹1.8L, NAAC A, avg placement ₹4.2L]

[Symbiosis Institute - fees ₹2.1L, NAAC A+, avg placement ₹5.8L] ...

Recommend top 3 colleges with specific reasons for this student.

**Monthly AI cost:** ₹0 — runs entirely on your VPS. No API key, no rate limits, no vendor dependency.


# **4. Complete Free Tools Stack**
Every tool below is open-source self-hosted on your VPS, fully free-tier, or zero-cost to integrate. Nothing paid until you scale significantly.

|**Category**|**Tool**|**Cost**|**Free Limit / Notes**|
| :- | :- | :- | :- |
|College Search|MeiliSearch (self-hosted)|**FREE**|Open source. Typo-tolerant, instant, filterable. 30K+ records fine on 300MB RAM.|
|SMS Notifications|Brevo (Sendinblue)|**FREE**|300 SMS/day free. OTP, lead alerts to colleges. Upgrade at ₹999/mo only when > 300 leads/day.|
|Email (Transactional)|Brevo SMTP|**FREE**|300 emails/day free. Welcome, OTP, lead alerts, application updates, deadline reminders.|
|Maps & Location|Google Maps JS API|**FREE**|$200 credit/month = ~28,000 map loads. Enough for full MVP phase.|
|Payments|Razorpay|**FREE to setup**|₹0 monthly fee. 2% per transaction only — no cost until money flows.|
|Authentication|Better Auth (self-hosted)|**FREE**|Open source auth: Google OAuth, Facebook, email magic link, OTP. No third-party dependency.|
|Database|MySQL 8.0|**FREE**|Open source. Self-hosted on VPS. Zero licensing, unlimited rows.|
|Cache & Sessions|Redis / Valkey fork|**FREE**|Open source Redis-compatible. Self-hosted. Sessions, rate limiting, AI response cache.|
|Reverse Proxy + SSL|Nginx + Certbot|**FREE**|Let's Encrypt SSL certificates, auto-renews every 90 days. Free forever.|
|Image & File Storage|Cloudflare R2|**FREE**|10 GB storage + 1M operations/month free. Zero egress cost. S3-compatible API.|
|CDN + DDoS Protection|Cloudflare Free Plan|**FREE**|Unlimited bandwidth CDN, WAF, DDoS protection, HTTP/3, caching globally.|
|Web Analytics|Umami (self-hosted)|**FREE**|Open source Google Analytics alternative. No cookies, GDPR compliant, real-time.|
|Error Tracking|Sentry (free tier)|**FREE**|5,000 errors/month free. Enough for full MVP. Real-time frontend + backend error alerts.|
|Uptime Monitoring|UptimeRobot|**FREE**|50 monitors, 5-minute check interval, email/SMS alerts. Free forever.|
|CI/CD Pipeline|GitHub Actions|**FREE**|2,000 min/month free. Auto-deploy to VPS on every git push to main.|
|Admin Data Panel|NocoDB (self-hosted)|**FREE**|Open source Airtable. Connect to your MySQL. Manage all college data via UI.|
|Student Support Chat|Tawk.to|**FREE**|Unlimited live chat widget. Never expires, no agent limit on free plan.|
|WhatsApp Bot|Baileys (open source)|**FREE**|Node.js library for WhatsApp Web automation. Self-hosted, no API cost, no Meta approval.|
|Newsletter / Campaigns|Brevo (Email Marketing)|**FREE**|Up to 300 contacts on free plan. Student newsletters, exam alert campaigns.|
|Load Testing|k6 (open source)|**FREE**|Simulate 1,000+ concurrent users before launch. Self-hosted, CLI tool.|
|Log Management|Grafana Loki (self-hosted)|**FREE**|Lightweight log aggregation. Works with Grafana dashboards.|
|Monitoring Dashboards|Grafana + Prometheus|**FREE**|Full infrastructure monitoring. CPU, RAM, request rates, DB queries. All open source.|
|Project Management|Plane (self-hosted)|**FREE**|Open source Linear/Jira alternative. Track features, bugs, sprints.|
|Data Scraping|Puppeteer + Cheerio|**FREE**|Scrape public NIRF/NAAC/college websites for initial data seeding. Node.js based.|
|Process Manager|PM2|**FREE**|Node.js process manager. Auto-restart on crash, zero-downtime reloads, log management.|
|Containerization|Docker + Docker Compose|**FREE**|All services containerized. Single docker compose up starts everything.|

**Total monthly tool cost at launch:** ₹0 (ZERO) — every single tool is free at MVP scale.

**First paid upgrade:** Brevo SMS at ₹999/month — only needed when student leads exceed 300/day, meaning strong revenue is already flowing.


# **5. Full Technology Stack**

## **5.1 Frontend**

|**Layer**|**Technology**|**Why**|
| :- | :- | :- |
|Web Framework|Next.js 14 (App Router)|SSR for dynamic pages + SSG for college/exam pages = SEO gold. Free.|
|UI Components|shadcn/ui + Tailwind CSS|Production-quality components, no licensing, fast development.|
|Mobile App|React Native (Expo)|Single codebase for iOS + Android. Free tier covers all MVP needs.|
|State Management|Zustand + React Query|Lightweight, handles server state + local state cleanly.|
|Search UI|MeiliSearch JS client|Official open source client. Connects to your self-hosted MeiliSearch.|
|Charts & Data Viz|Recharts (open source)|Placement stats, fee trends, rank distributions. Free.|
|Forms|React Hook Form + Zod|Fast validation, zero dependencies. Free and open source.|

## **5.2 Backend**

|**Layer**|**Technology**|**Why**|
| :- | :- | :- |
|API Framework|Node.js + Fastify|Fastest Node.js framework (~30% faster than Express). Open source.|
|AI Services|Python + FastAPI (optional)|If needing separate ML microservice — can start with just Fastify calling Ollama.|
|Database|MySQL 8.0|Rock-solid relational DB. Best for colleges, courses, leads, users, reviews.|
|Search Engine|MeiliSearch v1.x|Open source. Handles 30K+ colleges with filters, typo tolerance, instant results.|
|Cache|Redis / Valkey|Self-hosted. Sessions, rate limiting, AI response caching, hot page cache.|
|File Storage|Cloudflare R2 (S3 API)|10 GB free + zero egress. Store college photos, student documents, PDFs.|
|Auth|Better Auth|Open source. Google/Facebook OAuth, magic links, OTP via Brevo email.|
|Task Queue|BullMQ (Redis-backed)|Background jobs: lead delivery emails, SMS alerts, data scraping tasks.|
|ORM|Prisma|Type-safe database queries, migrations management. Open source.|

## **5.3 Infrastructure & DevOps**

|**Layer**|**Technology**|**Why**|
| :- | :- | :- |
|Server OS|Ubuntu 22.04 LTS|Most stable, best supported. Free.|
|Containerization|Docker + Docker Compose|All services containerized. Easy to manage, restart, upgrade individually.|
|Reverse Proxy|Nginx|Routes all traffic, handles SSL termination, static file serving, gzip.|
|SSL|Let's Encrypt + Certbot|Free SSL, auto-renews. No cost ever.|
|CDN + WAF|Cloudflare Free|Global CDN, DDoS protection, bot mitigation. Free forever.|
|Process Manager|PM2|Manages Node processes. Auto-restart on crash. Free.|
|CI/CD|GitHub Actions + SSH deploy|Push to main → GitHub builds → SSH deploys to VPS. Free 2000 min/month.|
|Monitoring|Grafana + Prometheus + Loki|Full observability: metrics, logs, alerts. Entirely open source.|
|Uptime|UptimeRobot|External uptime checks every 5 min. Alert if server goes down. Free.|
|Backups|mysqldump + cron + R2 upload|Automated daily MySQL backups to Cloudflare R2. Free.|


# **6. Platform Modules — Complete Feature List**
The platform has three layers: Student-facing public modules, College B2B portal, and Admin operations panel.
## **6.1 Student-Facing Modules**
**Module 1 — College Discovery & Smart Search**

- Instant search powered by MeiliSearch: typo-tolerant, results appear as you type
- Natural language search: 'engineering colleges in Pune under ₹2 lakh' processed via AI
- Advanced filters: State, City, Stream, Course, Fees range (slider), NAAC Grade (A++/A+/A/B++), Ranking source (NIRF/QS India/THE), Entrance exam accepted
- Sort options: Relevance, Fees (low to high), NIRF Rank, Placement average, Newest first
- College cards: photo thumbnail, quick-stats bar (fees, NAAC, top placement company, accreditation badges)
- Map view: Google Maps integration showing all filtered colleges on an interactive map
- Bookmark/shortlist button on every card — saves to student dashboard without requiring login first
- Smart suggestion chips: 'Top MBA colleges in Delhi', 'NAAC A++ engineering colleges', etc.
- 'Best match' banner: highlights colleges matching student's profile after they complete it

**Module 2 — College Profile Pages**

- Hero section: college banner photo, logo, NAAC grade badge, NIRF rank, established year, type (Govt/Private/Deemed)
- Tabbed layout: Overview | Courses & Fees | Admission | Placements | Reviews | Gallery | Q&A
- Overview tab: About section, approvals & accreditations (UGC/AICTE/BCI/MCI), campus area, total students, facilities list
- Courses & Fees tab: All courses with duration, total fees, semester-wise fees, eligibility criteria, seats available per category
- Admission tab: Step-by-step admission process, important dates, documents required checklist, entrance exams accepted, cutoff history year-wise
- Placements tab: Average package, highest package, median package, top recruiting companies (logo grid), placement percentage, year-wise trend chart
- Reviews tab: Verified student/alumni reviews with star ratings across 5 dimensions — Infrastructure, Placements, Faculty, Campus Life, Value for Money
- Gallery tab: Campus photos, hostel photos, labs, sports facilities — uploaded by college and crowdsourced from students
- Q&A tab: Students ask questions, verified alumni or college admission team answers publicly
- Sticky sidebar: Quick facts (fees, location, rating), 'Enquire Now' button (lead form), 'Apply Now' button (for partner colleges)
- Related colleges section: 3 similar colleges recommended (same city + same stream + similar fees)
- SEO-optimized URL structure: edusearch.in/colleges/mit-pune-engineering (slug-based)

**Module 3 — Exam Information Hub**

- 350+ exam profile pages: JEE Main, JEE Advanced, NEET UG, CAT, CLAT, CUET UG/PG, MAT, XAT, SNAP, CMAT, GATE, GMAT, GRE, IELTS, TOEFL, SAT, state CETs
- Each exam page: Overview, Exam pattern, Eligibility, Syllabus (downloadable), Important dates, Admit card, Result, Cutoff, Accepting colleges
- Exam calendar widget: Monthly calendar showing all exam dates — students can filter by stream
- Cutoff database: Previous year cutoffs by college, category (General/OBC/SC/ST/EWS/PwD), course, and round (R1/R2/R3)
- Rank predictor tool: Enter JEE/NEET/CAT percentile → platform shows probable college admission list based on historical cutoffs
- Result notification: Student registers for exam alerts → gets Brevo email + SMS when results declared
- Mock test links: Aggregated from NTA official site and free YouTube playlists
- Exam preparation articles: Subject-wise tips, topper interviews, study timetable — generates long-tail SEO traffic

**Module 4 — AI Counseling Assistant**

- Chat-based interface: WhatsApp-style bubble UI, works on mobile and desktop
- Powered by Ollama + Llama 3.1 8B running on your VPS — zero API cost
- Onboarding questions: stream, current marks/percentile, entrance score if available, preferred cities, budget per year, career goal
- Backend matches profile against college database, injects top 10 candidates into LLM prompt
- AI generates personalized shortlist with 3–5 colleges, each with 2–3 sentence justification tailored to student's specific situation
- Follow-up conversations: student can ask 'What about hostels?', 'Which has better placements?', 'Is it safe for girls?' — AI answers from college data
- Escalation to human counselor: if student question is out of scope, AI offers WhatsApp handoff to human expert (premium)
- WhatsApp Bot: Students can text COUNSEL to your WhatsApp number — Baileys bot runs same counseling flow via WhatsApp chat
- AI response caching: Redis caches common queries for 30 minutes — prevents hammering Ollama for repeated questions
- Conversation history saved to student dashboard (if logged in)

**Module 5 — Direct Application & Admissions Tracker**

- Partner college badge: Colleges on paid plans get 'Apply Directly' feature enabled
- Application form: Name, contact, 10th/12th marks, entrance score, course selection — pre-filled from student profile
- Document upload vault: Student uploads marksheets, ID proof, passport photo, entrance scorecard — stored on Cloudflare R2
- Application fee payment: Razorpay integration — student pays college application fee through platform (platform retains 15% as commission)
- Real-time status tracker: Submitted → Under Review → Shortlisted → Interview Scheduled → Admitted / Waitlisted / Rejected
- Deadline alerts: Brevo email + SMS reminders 7 days, 3 days, 1 day before application deadline
- Multi-college applications: Student can track applications to 10+ colleges from single dashboard
- College admission inbox: Partner colleges receive applications in their B2B portal, can update status directly

**Module 6 — Reviews & Student Community**

- Review submission gate: Student must verify college email address (OTP via Brevo) OR upload student ID before review goes live — prevents fake reviews
- 5-dimension star ratings: Infrastructure (1–5), Placement Quality (1–5), Faculty (1–5), Campus Life (1–5), Value for Money (1–5)
- Mandatory fields: Batch year, current employment status, pros section, cons section, overall verdict
- Helpful votes: Other students upvote reviews they found useful — surfaces best reviews to top
- College response: College admin can officially respond to reviews (shows 'College Response' badge)
- Review reward system: Student earns 100 points for each approved review — redeemable for Amazon/Flipkart vouchers via partner API
- Q&A forum per college: Open questions, anyone can answer — alumni badge shown on verified alumni accounts
- Leaderboard: Top reviewers of the month shown on homepage — drives review volume
- Sentiment analysis: Llama model tags reviews as Positive/Neutral/Negative per dimension — shown as summary chart on college profile

**Module 7 — Study Abroad Module**

- 500+ international university profiles: USA (MIT, Stanford tier to mid-range), UK, Canada, Australia, Germany, Ireland, New Zealand
- Course-level details: Tuition fees shown in both USD/GBP and INR equivalent (live exchange rate via open API)
- Eligibility checker: Student inputs CGPA, IELTS/TOEFL score, work experience → shows 'Safe / Target / Reach' label for each university
- Scholarship database: University scholarships, government scholarships (ICCR, Chevening, DAAD, Fulbright) with amount and deadline
- Visa guidance hub: Country-specific F1/Tier-4/Study Permit guides, document checklists, processing timelines
- SOP / LOR guides: Article series on writing strong statements, what universities look for
- Education loan section: Partner with HDFC Credila, Avanse, Prodigy Finance — student gets loan eligibility estimate, bank earns referral commission
- Application timeline generator: Enter university deadline → platform generates reverse timeline with action items
- Student stories: Verified 'I got into X university with Y score' success stories — high SEO value and trust signal

**Module 8 — Career & Salary Insights**

- Salary data by degree + college tier + company: Crowdsourced from student submissions + AmbitionBox public data
- Career path explorer: Interactive tool — 'If I study B.Tech CSE from Tier-2 college in Maharashtra, what is my likely salary range in Year 1, Year 3, Year 5?'
- Industry demand heatmap: Which streams/skills are most in demand — updated quarterly from job portal trends
- Placement report aggregator: Team scrapes annual placement PDFs from college websites, normalizes data into standard format
- Company presence index: Shows which colleges a specific company (TCS, Infosys, Google, etc.) regularly recruits from
- ROI calculator: Total course fees vs expected salary over 5 years — helps students judge if a college is worth the investment
- Career articles: Engineering to MBA, salary negotiation, job market trends — drives organic SEO traffic

**Module 9 — Scholarship & Loan Finder**

- Scholarship search: Filter by category (SC/ST/OBC/Minority/General), state, income limit, merit percentage, course type
- 150+ scholarships listed: NSP scholarships, state government schemes, private scholarships (Tata, Reliance Foundation, Sitaram Jindal)
- Eligibility auto-check: Student enters profile → platform shows which scholarships they are eligible for
- Application links and deadlines: Direct links to official application portals, deadline countdown timers
- Education loan partner section: HDFC Credila, Avanse Financial Services, Prodigy Finance (study abroad), SBI Scholar Loan
- EMI calculator: Loan amount × interest rate × tenure → monthly EMI, total interest paid — interactive slider
- Loan eligibility estimator: Basic inputs → shows approximate loan amount student can get based on course and college
- Scholarship alert: Student registers for alerts → Brevo email when new scholarship matching their profile is added

**Module 10 — Student Dashboard (Personalization Hub)**

- Profile completeness meter: 'You are 70% complete — add your JEE score to unlock better recommendations'
- Profile fields: Stream, 10th marks, 12th marks, entrance exam scores, preferred cities (multi-select), budget range, career interests
- Shortlisted colleges board: Kanban-style cards — move colleges through To Research / Interested / Applied / Decision Made columns
- Comparison history: See all past college comparisons with one click
- Application tracker: All active applications with current status and next action items
- Document vault: Centralized upload for all documents — reuse across multiple applications without re-uploading
- Personalized feed: College news, cutoff updates, scholarship deadlines, exam notifications relevant to student's profile
- AI counselor history: All past chat sessions saved, searchable
- Deadline calendar: All application deadlines and exam dates in one view — exportable to Google Calendar
- Recommended colleges refresh: As student updates marks or scores, recommendations update automatically
## **6.2 College B2B Portal**
**College Dashboard — Full Feature Set**

- Onboarding wizard: College registers → fills basic info → uploads verification documents (AICTE/UGC approval) → goes live after admin approval
- Profile management: Self-serve editor for all profile fields — courses, fees, photos, video tour links, placement data, faculty count
- Photo gallery manager: Upload, reorder, delete campus photos. Cloudflare R2 storage, auto-compressed.
- Lead inbox: View all student leads — name, phone, email, course interest, city, submitted date. Filter by course, date range. Download CSV.
- Lead quality scoring: Each lead shows a score (High/Medium/Low) based on profile completeness and intent signals
- Real-time lead alerts: Brevo SMS + email fires to college admission team the instant a new lead comes in
- Application management: For partner colleges — receive full applications, review documents, update admission status for each applicant
- Analytics dashboard: Impressions (how many students saw the profile), Clicks (how many opened it), Leads (how many enquired), Conversion rate, Lead source breakdown
- Review management: Read all student reviews, post official college responses, flag reviews for admin investigation
- Sponsorship management: View current sponsored listing status, expiry date, upgrade options
- Invoice history: Download all monthly CPL invoices and subscription invoices in PDF format
- Scholarship listing: Colleges can list their own merit/need scholarships — appears in platform scholarship finder
## **6.3 Admin & Operations Panel**
**Admin Panel — Full Control Features**

- College database CMS: Add, edit, verify, publish/unpublish any of the 30,000+ college records. Powered by NocoDB connected to MySQL.
- Content management: Create and edit exam pages, blog articles, scholarship listings, ranking pages via markdown editor
- Review moderation queue: All new reviews go through admin approval. Flag for inappropriate content, verify student proof documents.
- Lead management system: View all leads platform-wide, assign to college CRM, track delivery status, handle disputes
- Revenue dashboard: Total CPL revenue this month, active subscriptions, pending invoices, collection status per college
- User management: View all student accounts, college accounts — suspend, verify, reset passwords
- SEO tools panel: Edit meta title/description for any page, manage canonical tags, view sitemap generation status
- Scraping jobs dashboard: View status of automated college data scraping jobs — last run, success/failure, records updated
- System health monitor: Grafana dashboards embedded — server CPU, RAM, request rates, MySQL query times, MeiliSearch index size
- Fraud detection alerts: Auto-flagged suspicious reviews (same IP, same device ID), unusual lead volumes, fake college registrations
- Bulk data import: Upload college data via CSV (mapped to MySQL schema) for mass onboarding
- College verification workflow: Admin reviews uploaded AICTE/UGC certificates before marking college as 'Verified' on platform


# **7. System Flow Diagrams**
## **7.1 Student Discovery & Counseling Flow**
1. Student lands on EduSearch (Google organic SEO / WhatsApp share / social media / direct)
1. Sees homepage search bar → types query (e.g., 'MBA colleges in Delhi under 5 lakhs')
1. MeiliSearch returns instant results → student browses college cards with quick-stats
1. Student applies filters (city, stream, fees, NAAC grade) → results update instantly
1. Clicks college card → full profile page loads (SSR from Next.js, cached by Cloudflare CDN)
1. Reads courses, fees table, placement stats, verified student reviews
1. Clicks 'Compare' → adds up to 4 colleges → side-by-side comparison table
1. Clicks 'Get AI Counseling' → chat UI opens → AI asks for marks, budget, city preference
1. Backend: MySQL query for matches → Ollama + Llama 3.1 generates personalized list → streamed to chat
1. Student gets 3–5 tailored college recommendations with reasons → clicks through to profile pages
1. Student creates free account (Google OAuth via Better Auth) → shortlists saved to dashboard
1. Student clicks 'Enquire Now' → fills name/phone/email → lead delivered to college via Brevo

## **7.2 Lead Generation Flow (Core B2B Revenue)**
1. Student fills 'Enquire Now' form on college profile (name, phone, email, course interest)
1. Fastify API validates input → stores lead in MySQL with timestamp, source page, student profile data
1. Lead assigned a quality score (High/Medium/Low) based on profile completeness
1. BullMQ job triggered → Brevo SMS fires to college admission team within 60 seconds
1. Brevo email sent to college team (full lead details) + confirmation email to student
1. Lead appears in college's B2B portal lead inbox — sortable, filterable, downloadable
1. Platform logs CPL billing event → invoiced monthly to college
1. If student enrolls and college confirms → platform earns CPS (Cost Per Student) commission

## **7.3 Application Flow (Partner Colleges)**
1. Student clicks 'Apply Now' on partner college profile
1. Application form opens — pre-filled with saved profile data (marks, scores, personal details)
1. Student uploads required documents (marksheets, ID) → Cloudflare R2 storage
1. Razorpay payment widget opens for application fee → student pays → platform takes 15% commission
1. Application lands in college's B2B portal application inbox
1. College admission team reviews → updates status (Shortlisted / Interview / Admitted / Rejected)
1. Student's dashboard reflects latest status in real-time
1. Brevo email + SMS fired to student at each status change
1. Admitted student prompted to write a college review → earns 100 reward points

## **7.4 WhatsApp Bot Flow**
1. Student sends 'COUNSEL' to platform WhatsApp number
1. Baileys bot responds: 'Welcome to EduSearch! Which stream are you in? (Engineering / Medical / Commerce / Arts)'
1. Conversation flows: stream → marks → budget → preferred city → career goal
1. Bot calls Fastify AI counseling API → gets Llama-generated recommendations
1. Bot sends formatted list: 'Top 3 colleges for you: 1. MIT Pune (₹1.8L/yr, NAAC A, avg placement ₹4.2L)...'
1. Student can reply with college name to get more details → bot fetches from MySQL
1. Student interested → bot sends profile page link → lead captured when student clicks Enquire Now


# **8. What We Do Differently (Competitive Advantage)**
Collegedunia's core weakness is a 68% bounce rate — most users leave within 30 seconds. Here is how EduSearch creates lasting engagement and stronger trust:

|**Feature**|**Collegedunia**|**EduSearch**|**Our Advantage**|
| :- | :- | :- | :- |
|AI Counselor|None|Llama 3.1 self-hosted chat counselor|Personalized shortlist vs generic lists — users stay 5x longer|
|AI Cost|—|₹0/month (self-hosted Ollama)|Permanent cost advantage vs competitors paying ₹50K+/month|
|Direct Application|Limited|Full workflow — form, docs, payment, tracking|Students never leave platform to apply|
|Verified Reviews|Open, unverified|College email OTP or student ID required|Higher trust. Harder to fake. Colleges trust the data.|
|WhatsApp Bot|None|Baileys self-hosted bot, free|Reaches Tier-3 city students who prefer WhatsApp over websites|
|College Search|Standard filters|MeiliSearch — instant, typo-tolerant, NLP|Dramatically better UX. Users find what they want faster.|
|Analytics Privacy|Google Analytics|Umami self-hosted — no cookie banners|Cleaner UX. GDPR compliant. Better for future EU/NRI expansion.|
|Salary/ROI Data|None|Career path explorer + ROI calculator|High-value tool that drives return visits and bookmarks|
|Rank Predictor|Yes|Yes + integrated into AI counselor flow|Seamless: predict rank → see matching colleges → apply directly|
|Study Abroad|Growing|Full vertical: loan, visa, SOP, eligibility check|One-stop vs jumping between 5 different sites|
|College Self-Update|Team-managed|Self-serve portal — colleges update own data|Always fresh data. Colleges invested in accuracy.|
|Ranking Transparency|Pay-to-rank suspected|Clear methodology, organic results not for sale|Trust differential — students will prefer EduSearch over time|
|Infrastructure Cost|~₹5L+/month|~₹650/month (VPS only)|Resource freed for marketing and BD instead of cloud bills|


# **9. 30-Day Launch Timeline**
Aggressive but achievable with 2 full-time developers plus 1 part-time content/data person. Focus is launching a working, revenue-ready product — not a perfect one.

## **WEEK 1 — Days 1–7: Infrastructure & Foundation**

|**Day**|**Tasks**|**Deliverable**|
| :- | :- | :- |
|Day 1|VPS setup: Ubuntu 22.04, Nginx, Docker + Docker Compose, Certbot SSL. Domain DNS pointed to VPS. Cloudflare proxy enabled.|Live server at yourdomain.in with SSL|
|Day 1|GitHub repo created. GitHub Actions CI/CD configured: push to main → SSH deploy to VPS. .env.example with all keys documented.|One-click deploy pipeline working|
|Day 2|MySQL 8.0 in Docker. Full database schema designed and migrated: colleges, courses, exams, users, leads, reviews, applications, sessions tables.|Database running with schema|
|Day 2|Ollama installed on VPS. Llama 3.1 8B Q4\_K\_M model pulled (~4.7 GB). Test inference via curl. Confirm it responds in < 10 sec.|AI model answering test prompts|
|Day 3|MeiliSearch in Docker. College search index schema defined. Redis in Docker for cache + sessions. PM2 installed for process management.|Search engine + cache running|
|Day 3|Data seeding script: Scrape 2,000 college records from public NIRF/NAAC data using Puppeteer. Ingest into MySQL + MeiliSearch index.|2,000 colleges searchable|
|Day 4|Next.js 14 project bootstrapped: Tailwind CSS, shadcn/ui, folder structure (app router), SEO config, Cloudflare R2 SDK integrated.|Next.js boilerplate deployed|
|Day 4|Fastify API server: base routes, CORS, middleware, health check endpoint, error handling, Prisma ORM connected to MySQL.|API server running on :3001|
|Day 5|Better Auth: Google OAuth + email OTP (via Brevo SMTP). Login and signup flows tested end-to-end. Session stored in Redis.|Auth fully working|
|Day 5|College search API: MeiliSearch integration, filter endpoints (city, stream, fees range, NAAC grade), pagination, sorting.|Search API returns filtered results|
|Day 6|NocoDB installed in Docker connected to MySQL. Admin panel accessible at /admin (IP-restricted to team IPs only).|Admin data management working|
|Day 6|Brevo account setup: SMTP for email, SMS API key. Test OTP flow. BullMQ job queue for async lead delivery emails.|Email + SMS delivery tested|
|Day 7|Google Maps API key configured (free tier). Cloudflare R2 bucket created, image upload API endpoint built. Full integration test of all services.|All services integrated and stable|

## **WEEK 2 — Days 8–14: Core Student Features**

|**Day**|**Tasks**|**Deliverable**|
| :- | :- | :- |
|Day 8|Homepage: hero search bar, category chips (Engineering/Medical/MBA/Law/Design), featured colleges section, recent exam alerts strip.|Homepage live|
|Day 8|College listing page: search bar, filter sidebar (city/stream/fees/NAAC), college cards grid with bookmark button, pagination.|College search page working|
|Day 9|College profile page full layout: hero section, tabbed navigation, Overview tab (about, facilities, accreditation badges).|Profile page structure done|
|Day 9|Courses & Fees tab, Admission tab (process steps, dates, documents checklist, cutoff table), Placements tab (stats, companies logo grid).|All profile tabs complete|
|Day 10|Reviews tab: display approved reviews with star ratings, helpful votes, pagination. Gallery tab: photo grid from R2 storage.|Reviews and gallery working|
|Day 10|50 top exam pages (JEE, NEET, CAT, CUET, CLAT, GATE + state exams): static content, exam pattern, dates, accepting colleges list.|50 exam pages live and indexed|
|Day 11|AI Counselor chat UI: WhatsApp-style bubble interface, streaming text display, loading indicator, mobile-responsive.|Chat UI built|
|Day 11|AI Counselor Fastify API: receive student profile → query MySQL → build prompt → call Ollama → stream response. Redis caching layer.|AI counselor responding end-to-end|
|Day 12|College comparison tool: 'Compare' button on cards, comparison drawer (up to 4 colleges), full side-by-side table with 20+ parameters.|Comparison tool working|
|Day 12|Student dashboard: shortlist board (Kanban), saved searches, profile completion meter, personalized college recommendations feed.|Dashboard functional|
|Day 13|Lead capture: 'Enquire Now' modal on every college profile. Form validation, Brevo SMS + email delivery, MySQL storage, BullMQ job.|Lead generation working|
|Day 13|Review submission flow: form with 5-dimension ratings, OTP verification via Brevo email, admin moderation queue in NocoDB.|Review system end-to-end|
|Day 14|Mobile responsiveness audit of all pages. SEO: meta titles, descriptions, Open Graph tags, canonical URLs, sitemap.xml auto-generation, robots.txt.|SEO foundation complete|

## **WEEK 3 — Days 15–21: B2B Portal & Revenue Features**

|**Day**|**Tasks**|**Deliverable**|
| :- | :- | :- |
|Day 15|College B2B portal: college signup/login (separate from student auth), onboarding wizard (basic info, document upload for verification).|Colleges can register|
|Day 15|College profile self-management: editor for all fields, photo gallery manager (upload to R2), course fee table editor.|Colleges manage own profiles|
|Day 16|College lead inbox: view all leads, filter by course/date/quality score, mark as contacted, download CSV. Real-time badge for new leads.|College lead management done|
|Day 16|Razorpay integration: payment widget for application fees (student pays college fee via platform). Webhook for payment confirmation. Platform takes 15%.|Payments processing live|
|Day 17|Sponsored listings: backend logic for priority ranking of paid colleges in search results. Sponsored badge display on college cards and profiles.|Sponsored listing revenue feature live|
|Day 17|Scholarship finder module: 150+ scholarships in database, search/filter by category/state/income/merit, eligibility auto-check, NSP and state portal links.|Scholarship module complete|
|Day 18|Rank predictor tool: student inputs JEE/NEET/CAT percentile + category → see list of colleges they can likely get into based on past cutoffs.|Rank predictor working|
|Day 18|WhatsApp Bot: Baileys library integrated. Bot number set up. Conversation flow: stream → marks → budget → AI counseling → college links.|WhatsApp bot live|
|Day 19|Blog CMS: markdown-based article system with category tags, author, publish date, SEO meta. 20 articles published (exam guides, ranking lists, career articles).|Blog live with 20 articles|
|Day 19|Career & Salary Insights module: salary data entry (crowdsourced form), career path explorer UI, ROI calculator tool.|Career module functional|
|Day 20|Study Abroad module: 100 university profiles (US/UK/Canada/Australia focus), course pages, eligibility checker tool, scholarship listings, education loan partner section.|Study abroad module live|
|Day 21|Umami analytics deployed. Sentry error tracking configured for frontend + backend. UptimeRobot monitoring all critical endpoints. Grafana basic dashboards.|Full observability stack live|

## **WEEK 4 — Days 22–30: Data Scale, Polish & Launch**

|**Day**|**Tasks**|**Deliverable**|
| :- | :- | :- |
|Day 22–23|Data blitz: Expand college database from 2,000 to 8,000+ verified records. Use Puppeteer scraping + manual enrichment for top 500 colleges.|8,000+ colleges in search|
|Day 24|Expand exam pages from 50 to 150+. Add full cutoff data tables for top 100 exams. Add 50 more scholarship records.|150 exam pages, 200 scholarships|
|Day 25|Redis caching for college profile pages (5-min TTL) and search results (2-min TTL) — reduces MySQL load and speeds up repeat visits.|Pages load < 200ms for cached content|
|Day 25|Programmatic SEO pages: auto-generate 'Top Engineering Colleges in [City]' pages for all state capitals (30 cities × 10 streams = 300 auto pages).|300 programmatic SEO pages live|
|Day 26|Load test with k6: simulate 500 concurrent users. Fix any bottlenecks. Tune Nginx worker processes and MySQL connection pool.|Server stable under load|
|Day 26|Security hardening: rate limiting on all API endpoints (Redis-based), input sanitization, SQL injection prevention via Prisma, fail2ban on VPS SSH.|Security audit complete|
|Day 27|Automated MySQL backup: daily mysqldump compressed + uploaded to Cloudflare R2. Cron job + alert if backup fails.|Automated backups running|
|Day 28|B2B pre-launch sales: call/email 30 private colleges in target state. Offer: 'Free 1-month trial, 50 leads guaranteed.' Target 5 signed clients.|5+ paying college clients before launch|
|Day 29|Beta launch: Share in 10 student WhatsApp groups and Telegram communities. Post on Reddit r/Indian\_Academia, r/JEEPreparation, r/CAT\_Preparation. Collect feedback.|First 100+ real users, bug list compiled|
|Day 30|Bug fix sprint from beta feedback. Final Lighthouse audit (target > 80 score). Press release drafted. OFFICIAL PUBLIC LAUNCH 🚀|Platform fully live|


# **10. Business Model & Revenue Streams**
Bootstrap launch starts with 2 revenue streams on Day 1. Additional streams activate as traction builds. Every stream is designed for low operational overhead — most is automated.

## **10.1 Revenue Stream 1 — Cost Per Lead (CPL) — Primary**
**Launch on:** Day 1 — First B2B college client signed

- How it works: College pays a fixed amount for every verified student lead delivered to their inbox. Lead = student who filled the Enquire Now form with real name + phone + email + course interest.
- Pricing: ₹300–₹400/lead for diploma/certificate courses. ₹500–₹800/lead for engineering and science UG. ₹800–₹1,500/lead for MBA, law, medical, and management programs.
- Lead quality guarantee: If more than 20% of leads have invalid phone numbers, platform credits the difference — builds college trust.
- Billing: Monthly invoice via email. Colleges pay upfront lead credit (prepaid model) or net-30 billing once relationship established.
- Revenue example: 10 college clients × 200 leads/month × ₹600 average = ₹12,00,000/month from CPL alone at moderate scale.

## **10.2 Revenue Stream 2 — Premium Featured Listing**
**Launch on:** Day 1 — Bundle with CPL package for easier first sale

- How it works: Paying colleges get Featured badge on search results, appear in top 3 positions for relevant search queries, get a highlighted banner on relevant exam pages, and show up in AI counselor recommendations with priority.
- Pricing tiers: Basic Featured — ₹15,000/month (top position in one city + one stream). Standard — ₹30,000/month (statewide + 3 streams). Premium — ₹60,000–₹1,50,000/month (national + all streams + homepage banner).
- Annual discount: 2 months free on annual payment — ₹1,50,000/year for Basic instead of ₹1,80,000.
- Organic listings untouched: Non-paying colleges still appear in organic results. Only sponsored positions are sold — maintains platform credibility.
- Revenue example: 5 Basic clients + 3 Standard clients + 1 Premium client = ₹75K + ₹90K + ₹1L = ₹2,65,000/month from listings at early stage.

## **10.3 Revenue Stream 3 — Application Fee Commission**
**Launch from:** Month 2 — after 10+ partner colleges onboarded

- How it works: Partner colleges enable 'Apply Directly' on their profile. Students apply and pay the application fee (₹500–₹2,000) through the platform via Razorpay. Platform retains 15% as processing commission.
- Revenue per transaction: ₹75–₹300 per application. Low effort — fully automated.
- Scale math: 500 applications/month × ₹150 avg commission = ₹75,000/month. Grows linearly with college onboarding.
- College incentive: Platform drives applications directly — saves college from their own admission marketing spend.

## **10.4 Revenue Stream 4 — B2B Analytics Subscription**
**Launch from:** Month 3–4 — after colleges see value in lead dashboard

- How it works: Colleges pay a monthly subscription for advanced analytics: conversion funnel analysis, lead quality trends, competitor impressions, student demographics breakdown, placement data comparisons.
- Pricing: Starter ₹5,000/month (basic analytics, 6-month data). Growth ₹15,000/month (full analytics, 2-year trends, export). Enterprise ₹30,000–₹60,000/month (API access, custom reports, dedicated account manager).
- Sticky revenue: Once a college integrates analytics into their admissions process, churn is very low. LTV is 18–36 months.
- Revenue example: 20 Starter + 8 Growth + 2 Enterprise = ₹1L + ₹1.2L + ₹1L = ₹3,20,000/month at moderate scale.

## **10.5 Revenue Stream 5 — Human Counseling Premium (B2C)**
**Launch from:** Month 3 — after AI counselor proves value and builds demand

- How it works: Students who want personalized 1-on-1 guidance book a video session with a verified expert counselor (retired college admissions staff, IIT/IIM alumni). Platform takes 30% commission.
- Pricing: Quick Chat (30 min) ₹499. Standard Session (60 min, with shortlist report) ₹999. Comprehensive Guidance (90 min + SOP review + email follow-up) ₹1,999–₹2,999.
- Counselor onboarding: Platform recruits 10–20 freelance counselors. They register, get verified, set availability. Bookings managed through platform calendar. Payment via Razorpay split.
- Revenue example: 200 sessions/month × ₹999 avg × 30% commission = ₹59,940/month. Grows with word of mouth.

## **10.6 Revenue Stream 6 — Education Loan Referral Commission**
**Launch from:** Month 3 — integrate loan partner APIs

- How it works: Student uses EMI calculator or loan finder → clicks 'Check Eligibility' → redirected to partner bank/NBFC with referral tracking. Platform earns fixed commission per disbursed loan.
- Partners: HDFC Credila (domestic + abroad), Avanse Financial Services, Prodigy Finance (study abroad), SBI Scholar Loan, Incred Finance.
- Commission: ₹2,000–₹5,000 per domestic loan disbursed. ₹5,000–₹15,000 per international study loan disbursed.
- Revenue example: 50 domestic loan referrals × ₹3,000 + 10 abroad loans × ₹8,000 = ₹1,50,000 + ₹80,000 = ₹2,30,000/month at moderate scale.

## **10.7 Revenue Stream 7 — Study Abroad Commission**
**Launch from:** Month 4 — after study abroad module has traffic

- How it works: Foreign universities partner with EduSearch. When a student applies to a partner university through the platform and gets admitted, university pays a recruitment commission.
- Commission: 10–15% of first-year tuition. Average first-year tuition: $20,000–$35,000. Commission per enrolled student: $2,000–$5,000 (₹1.7L–₹4.2L per student).
- Low volume, high ticket: Even 5 international enrollments per month = ₹8L–₹20L additional revenue.
- Compliance: Register as authorized education agent (free registration with most universities). Signed partnership agreements required.

## **10.8 Revenue Stream 8 — Scholarship & Exam Content Sponsorship**
**Launch from:** Month 4 — after significant exam page traffic established

- How it works: Coaching institutes (Allen, FIITJEE, Unacademy, Physics Wallah, TIME, IMS) pay to sponsor exam preparation pages. Formats: banner ads, 'Recommended by' sections, first result in related coaching links.
- Pricing: Exam page sponsorship ₹50,000–₹2,00,000/month depending on exam traffic (JEE/NEET pages command premium). Scholarship page banner ₹20,000–₹50,000/month.
- Important: Label all sponsored content clearly. Non-sponsored organic content remains unaffected — preserves trust.

## **10.9 Revenue Stream 9 — Offline Franchise Counseling Centers**
**Launch from:** Month 6+ — after platform brand is established

- How it works: License the EduSearch brand and platform access to local entrepreneurs in Tier-2/3 cities who run physical counseling centers. They use the platform for college research and lead submission.
- Revenue model: Franchise setup fee ₹1,00,000–₹2,00,000 (one-time). Monthly royalty: 15% of counseling revenue generated by the center.
- Value for franchisee: Brand recognition, platform access, trained counselors, marketing support from HQ, ready-made student acquisition system.
- Expansion without capital: Platform grows geographic reach without hiring local staff or renting offices. Asset-light scaling.

## **10.10 Revenue Projections**

|**Period**|**Active College Clients**|**Monthly Leads Delivered**|**Est. Monthly Revenue**|**Est. ARR**|
| :- | :- | :- | :- | :- |
|Month 1–2 (Post-launch)|5–10 colleges|300–500 leads|₹90K–₹1.8L|—|
|Month 3–6|20–40 colleges|2,000–5,000 leads|₹3.5L–₹8L|₹4.2Cr–₹9.6Cr|
|Month 7–12 (Year 1 end)|60–100 colleges|8,000–15,000 leads|₹10L–₹22L|₹12Cr–₹26Cr|
|Year 2|200–400 colleges|30,000–60,000 leads|₹30L–₹65L|₹36Cr–₹78Cr|
|Year 3|800–1,200 colleges|1,00,000+ leads|₹80L–₹1.5Cr|₹96Cr–₹180Cr|

## **10.11 Unit Economics**
**CPL revenue per college (avg):** ₹600/lead × 200 leads/month = ₹1,20,000/month per active college client

**LTV of a college client:** ₹1.2L/month × 24 months average retention = ₹28.8L LTV

**CAC for a college client:** ₹15,000–₹40,000 (founder outreach, demo call, contract) — LTV:CAC ratio = 10:1+

**Student acquisition cost:** ₹0 (organic SEO) to ₹80–₹150 (paid search for high-intent traffic). Primary strategy is SEO-first.

**Gross margin target:** 65–75% blended across all revenue streams by Month 12 (after removing Brevo/Razorpay variable costs)


# **11. Complete Cost Breakdown — 24 Months**

## **11.1 Platform Infrastructure Costs**

|**Item**|**Cost**|**Period**|**24-Month Total**|
| :- | :- | :- | :- |
|Hostinger VPS (2 vCPU, 8GB RAM, 100GB NVMe)|₹15,548|Paid upfront for 24 months|₹15,548|
|Domain name (.in or .com)|₹800–₹1,500|Year 1 registration|₹1,600–₹3,000 (with renewal)|
|Cloudflare (Free plan)|**₹0**|Forever free|**₹0**|
|Cloudflare R2 storage (first 10GB free)|**₹0**|Free for MVP phase|₹0 until >10GB|
|Let's Encrypt SSL certificates|**₹0**|Forever free, auto-renews|**₹0**|
|Google Maps API (free tier)|**₹0**|$200/month credit covers MVP traffic|₹0 for MVP|

**Total 24-month infrastructure cost:** ₹17,148 – ₹18,548 (all-in, including domain renewal). This is your only mandatory platform cost.

## **11.2 Tools That Scale From Free to Paid**

|**Tool**|**Free Tier**|**When Free Runs Out**|**Paid Cost**|
| :- | :- | :- | :- |
|Brevo SMS|300 SMS/day free|When leads exceed 300/day (~9,000 leads/month)|₹999/month — by then earning ₹50L+/month|
|Brevo Email|300 emails/day free|When emails exceed 300/day|₹999/month Starter plan|
|Cloudflare R2|10 GB + 1M ops/month free|When college photo storage exceeds 10GB|~₹700/month per 10GB — negligible|
|Google Maps API|$200 free credit/month|When map loads exceed 28,000/month|~₹2 per 1,000 loads — minimal|
|Sentry errors|5,000 errors/month free|When errors exceed 5,000/month|~₹1,500/month — indicates scale = revenue|
|Razorpay|₹0 monthly fee|Never — only 2% per transaction (revenue-linked)|2% of transaction value only|
|GitHub Actions|2,000 min/month free|For a small team, rarely exceeded|₹3,200/month — far future concern|

**Monthly tool cost at launch:** ₹0 — all tools free at MVP scale.

**Monthly tool cost at Year 2 scale:** ₹3,000–₹8,000 — still negligible vs revenue of ₹30L+/month.

## **11.3 Total 24-Month Cost Summary**

|**Category**|**Year 1**|**Year 2**|**24-Month Total**|
| :- | :- | :- | :- |
|VPS Hosting|₹15,548 (upfront)|Included in upfront|₹15,548|
|Domain Name|₹800–₹1,500|₹800–₹1,500 renewal|₹1,600–₹3,000|
|Tools (at MVP → growth scale)|**₹0**|₹15,000–₹60,000|₹15,000–₹60,000|
|TOTAL PLATFORM COST|₹16,348–₹17,048|₹15,800–₹61,500|~₹17,000–₹78,000|
|Equivalent paid SaaS stack (AWS+APIs)|₹12L–₹20L/year|₹15L–₹25L/year|₹27L–₹45L over 24 months|

**You save vs a paid SaaS stack:** ₹25–₹44 LAKH over 24 months. Every rupee saved is runway — more time to grow revenue before needing investors.


# **12. SEO & Organic Growth Strategy**
SEO is the single most important growth lever. Collegedunia's core moat is its 15 million monthly organic visitors. You build this the same way — but faster with programmatic pages and AI-generated content at scale. 70–80% of all student traffic will come from Google search.

## **12.1 Programmatic SEO (Highest Priority)**
- Auto-generate 'Best {Stream} Colleges in {City}' for all 29 states + 50 top cities × 15 streams = 1,150+ auto-pages from day 1
- Auto-generate '{College Name} Review 2026', '{College Name} Fees', '{College Name} Placement' — one page per college × 30,000 colleges = 90,000+ pages
- Auto-generate '{Exam Name} Cutoff {Year}' and '{Exam Name} Accepting Colleges' — 350 exams × 5 page types = 1,750+ exam pages
- Auto-generate 'Top {Course} colleges under {Fee} in {State}' — 10 course types × 5 fee brackets × 29 states = 1,450+ pages
- Total programmatic pages at launch: 95,000+. These rank long-tail keywords with near-zero competition — fastest path to organic traffic.

## **12.2 Editorial Content Strategy**
- Annual ranking articles: 'Top 100 Engineering Colleges in India 2026', 'Best MBA Colleges by ROI' — these rank for millions of searches
- Exam guides: JEE Mains syllabus, NEET preparation tips, CAT 100-day study plan — each article targets 5,000–50,000 monthly searches
- Comparison articles: 'IIT vs NIT', 'MBA vs PGDM Difference', 'BITS Pilani vs Manipal' — very high commercial intent
- Career roadmap articles: 'What to do after 12th PCM', 'Is B.Tech worth it in 2026?' — captures early-funnel students
- State-specific guides: 'Best engineering colleges in Maharashtra for 80 percentile JEE' — regional content with less competition
- Target: Publish 5 SEO articles per week from Day 1. Use Llama to draft outlines, human editor finalizes. 200+ articles in 6 months.

## **12.3 Distribution & Community Building**
- Reddit strategy: Post helpful content in r/JEEPreparation, r/CAT\_Preparation, r/Indian\_Academia, r/Btechtards. Never spam — provide genuine value, platform link in profile.
- Telegram and WhatsApp groups: Join and contribute to existing student communities. Build your own EduSearch student channel with exam alerts and cutoffs.
- YouTube: 'College Review' video series (film 2-minute campus reviews). Each video embeds on college profile page — drives traffic and dwell time.
- Instagram Reels / YouTube Shorts: 'JEE cutoff revealed', 'Which college for 80 percentile', '5 colleges under ₹2 lakh in Pune' — viral content formats.
- Influencer outreach: Partner with study/college-related YouTube channels (100K–500K subscribers). Free featured listing for 3 months in exchange for review video.

## **12.4 Technical SEO Checklist**
- Core Web Vitals: Cloudflare CDN + Next.js static generation = fast TTFB. Target LCP < 2.5 seconds.
- Structured data: Add Schema.org markup — EducationalOrganization, Course, Review, FAQPage on all relevant pages. Enables Google rich results.
- Internal linking: Every college page links to its city page, its stream page, and 3 similar college pages. Distributes page authority across site.
- URL structure: edusearch.in/colleges/{city}/{slug} — clean, keyword-rich, human-readable URLs for all college pages.
- Sitemap: Auto-generated XML sitemap submitted to Google Search Console. Regenerated daily as new colleges are added.


# **13. Go-To-Market Strategy**

## **Phase 1 — Pre-Launch (Days 1–28, Parallel to Building)**
1. Register on IndiaMART and JustDial as an education consultant — gets early B2B inquiries
1. LinkedIn outreach: connect with admission directors and marketing heads of 100 private colleges in your target state
1. Cold call script: 'We are launching EduSearch next month. We want to offer you 50 guaranteed leads in the first month for ₹20,000 as a pilot. You pay only after receiving leads.' — low friction offer
1. Target closing 5–10 paying college clients before Day 30 launch
1. Build WhatsApp community: 'EduSearch Students 2026' — invite Class 12 students from school groups. Target 500 members before launch.
1. Publish 20 blog articles and have them indexed by Google before launch day — head start on SEO

## **Phase 2 — Launch Month (Day 30 + 30 days)**
1. Target 3 states first: UP, Maharashtra, or Punjab (highest concentration of private colleges and students)
1. Post launch announcement in all student communities, Reddit, LinkedIn with a clear hook: 'Free AI counselor to help you find the right college — no spam calls unless you ask'
1. Google Ads: ₹10,000–₹20,000 budget on high-intent keywords only: 'MBA admission 2026', 'engineering college in Pune', 'NEET cutoff 2025'. Stop if CPL > ₹150.
1. PR outreach: Send press release to Hindustan Times Education, Times of India Education, India Today Education supplement
1. Attend 1–2 education fairs or career counseling events in target city — set up stall, collect student data

## **Phase 3 — Month 2–6 Scale**
1. Expand college client base to 50+ paying clients through referrals from happy early clients
1. Launch mobile app on Play Store (Android first — 95% of Indian students use Android)
1. Launch study abroad vertical targeting IELTS/GRE searchers — high CPL potential from foreign universities
1. Introduce human counseling bookings — upsell to students who have used AI counselor 3+ times
1. Start offline franchise conversations in 3 Tier-2 cities where counseling demand is high (Lucknow, Nagpur, Coimbatore)

# **14. Key Risks & Mitigations**

|**Risk**|**Probability**|**Mitigation**|
| :- | :- | :- |
|VPS RAM too tight when Ollama + full traffic hit simultaneously|Medium|Cache AI responses aggressively in Redis. Add swap space (8GB) on VPS. Upgrade to 16GB VPS (₹1,200/mo extra) only when needed.|
|SEO takes 3–6 months to show results — slow start|High (normal)|Start SEO content from Day 1. Build WhatsApp community and Reddit presence for immediate traffic while SEO ramps up.|
|Colleges reject CPL model, want fixed-price only|Low–Medium|Offer hybrid: ₹15K/month flat for 30 leads. If they get 40, extra charged at CPL. Reduces their perceived risk.|
|Llama 3.1 gives inaccurate college recommendations|Medium|Always ground recommendations in MySQL data passed in prompt. Never let model hallucinate. Add 'Based on data we have' disclaimer.|
|Brevo SMS 300/day limit hit before revenue comes|Low|300 SMS/day = 9,000 leads/month. At even ₹400/lead CPL that is ₹36L/month revenue — easily covers ₹999/month upgrade.|
|Students distrust AI counselor recommendations|Medium|Show which data the AI used. Add 'Why this recommendation?' explanation. Allow override and manual search. Transparency builds trust.|
|College data becomes stale (old fees, closed courses)|High|Give colleges self-serve edit access from Day 1. Send monthly data refresh request email to all listed colleges. Flag 'Data last updated' prominently.|
|Competitor copies the model quickly|Medium|Your moat is data (reviews, leads history, placement data) and relationships (college clients who trust you). Speed to market is critical — launch in 30 days.|

# **15. Day 1 VPS Quick Start Commands**
Run these on your fresh Hostinger Ubuntu 22.04 VPS to get the full stack running:

\# Step 1 — Update system and install essentials

apt update && apt upgrade -y

apt install -y nginx certbot python3-certbot-nginx git curl fail2ban

\# Step 2 — Install Docker and Docker Compose

curl -fsSL https://get.docker.com | sh

usermod -aG docker $USER

\# Step 3 — Install Ollama and pull Llama 3.1 8B model (~4.7 GB)

curl -fsSL https://ollama.com/install.sh | sh

ollama pull llama3.1:8b-instruct-q4\_K\_M

\# Step 4 — Add swap space (safety net for RAM spikes)

fallocate -l 8G /swapfile && chmod 600 /swapfile

mkswap /swapfile && swapon /swapfile

echo '/swapfile none swap sw 0 0' >> /etc/fstab

\# Step 5 — Clone repo and start all services

git clone https://github.com/yourteam/edusearch.git /var/www/edusearch

cd /var/www/edusearch && cp .env.example .env

\# Edit .env with: DB passwords, Brevo API key, Razorpay keys, R2 keys

docker compose up -d

\# Step 6 — Get free SSL certificate

certbot --nginx -d edusearch.in -d www.edusearch.in

\# Step 7 — Verify everything is running

docker compose ps    # all services should show 'Up'

curl http://localhost:3001/health    # API health check

**Time from fresh VPS to all services running:** Under 3 hours. Ollama model download (~4.7 GB) is the longest step.

**Total 24-Month Platform Cost: ₹17,000–₹78,000  •  Monthly Tool Cost at Launch: ₹0  •  Go Live: Day 30**

*EduSearch Bootstrap Blueprint  |  February 2026*
#   C o d e M o b i l e  
 #   A d m i s s i o n S e a s o n  
 #   A d m i s s i o n S e a s o n  
 