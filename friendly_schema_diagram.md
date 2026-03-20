# Non-Technical Database Schema Overview

This diagram represents the entire database using plain English conceptually. There are no technical jargon or SQL types—just the categories of data we are storing for each part of the EduSearch platform and how those parts talk to each other.

```mermaid
erDiagram
    STUDENT_ACCOUNT ||--o| STUDENT_DETAILS : "has"
    STUDENT_ACCOUNT ||--o{ REVIEWS : "writes"
    STUDENT_ACCOUNT ||--o{ APPLICATIONS : "submits"
    STUDENT_ACCOUNT ||--o{ LEADS_AND_INQUIRIES : "sends"

    COLLEGE ||--o{ COURSES : "offers"
    COLLEGE ||--o{ COLLEGE_PHOTOS : "features"
    COLLEGE ||--o{ PAST_PLACEMENTS : "reports"
    COLLEGE ||--o{ RANKINGS_AND_AWARDS : "earned"
    
    COLLEGE ||--o{ APPLICATIONS : "receives"
    COLLEGE ||--o{ LEADS_AND_INQUIRIES : "receives"
    COLLEGE ||--o{ REVIEWS : "gets"

    COURSES ||--o{ EXAM_CUTOFFS : "has admission rules via"
    
    STUDENT_ACCOUNT {
        Text Full_Name
        Text Email_Address
        Text Phone_Number
        Text Account_Type_Role
    }
    STUDENT_DETAILS {
        Text Chosen_Stream
        Number Class_10_Marks
        Number Class_12_Marks
        List Preferred_Cities
        Money Budget_Range
        Text Career_Goals
    }
    COLLEGE {
        Text College_Name
        Text City_and_State
        Text Institution_Type
        Text NAAC_Grade
        Text Campus_Size
        Text About_the_College
        Text Admission_Steps
        Media Photos_and_Videos
        Document Brochure_PDF
    }
    COLLEGE_PHOTOS {
        Image Photo_File
        Text Category_Like_Hostel_or_Labs
        Text Description
    }
    RANKINGS_AND_AWARDS {
        Text Agency_Name_Like_NIRF
        Number Ranking_Position
        Number Year_Awarded
    }
    COURSES {
        Text Course_Name
        Text Stream_Like_Engineering
        Text Degree_Level_Like_UG_PG
        Number Duration_in_Years
        Money Total_Fees
        Text Eligibility_Rules
        Number Seats_Available
        Document Syllabus_PDF
    }
    EXAM_CUTOFFS {
        Text Exam_Name_Like_JEE
        Text Caste_Category
        Text Quota_Like_Home_State
        Number Opening_Score_or_Rank
        Number Closing_Score_or_Rank
        Number Counseling_Round
        Number Academic_Year
    }
    LEADS_AND_INQUIRIES {
        Text Student_Info
        Text Interested_Course
        Text Priority_Quality_Score
        Text Inquiry_Status
        Text Source_Where_They_Clicked_From
    }
    APPLICATIONS {
        Text Current_Status_Like_Admitted
        Text Payment_Status
        List Uploaded_Documents
        Date Application_Date
    }
    REVIEWS {
        Number Overall_10_Point_Rating
        Number Faculty_Rating
        Number Placements_Rating
        Number Infrastructure_Rating
        Text Written_Pros_and_Cons
        Text Written_Curriculum_Review
        Text Written_Campus_Life_Review
        Text AI_Sentiment_Positive_Negative
        Number Review_Detail_Quality_Score
    }
    PAST_PLACEMENTS {
        Number Academic_Year
        Money Highest_Salary_Package
        Money Average_Salary_Package
        Number Placement_Percentage
        List Recruiting_Companies_and_Logos
        Number Total_Job_Offers
    }
    SCHOLARSHIPS {
        Text Scholarship_Name
        Text Who_Can_Apply_Category
        Money Max_Family_Income_Allowed
        Number Minimum_Marks_Needed
        Document Required_Proof_Docs
        Date Application_Deadline
    }
```
