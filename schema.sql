CREATE TABLE Patients (
    PatientID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    DateOfBirth DATE,
    Gender ENUM('Male', 'Female', 'Other'),
    ContactInfo VARCHAR(255)
);

CREATE TABLE Doctors (
    DoctorID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Specialty VARCHAR(100),
    ContactInfo VARCHAR(255)
);

CREATE TABLE Appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    DoctorID INT,
    AppointmentDate DATE,
    ReasonForVisit TEXT,
    Status ENUM('Scheduled', 'Completed', 'Cancelled'),
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
    FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)
);

CREATE TABLE MedicalRecords (
    RecordID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    DoctorID INT,
    Diagnosis TEXT,
    Treatment TEXT,
    RecordDate DATE,
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
    FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)
);

CREATE TABLE Prescriptions (
    PrescriptionID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    DoctorID INT,
    Medication VARCHAR(255),
    Dosage VARCHAR(100),
    PrescriptionDate DATE,
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
    FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)
);


INSERT INTO Patients (FirstName, LastName, DateOfBirth, Gender, ContactInfo)
VALUES 
('John', 'Doe', '1990-05-15', 'Male', 'john.doe@gmail.com'),
('Jane', 'Smith', '1985-08-22', 'Female', 'jane.smith@gmail.com'),
('Michael', 'Johnson', '1978-11-02', 'Male', 'michael.johnson@gmail.com');

INSERT INTO Doctors (FirstName, LastName, Specialty, ContactInfo)
VALUES 
('Emily', 'Clark', 'Cardiologist', 'emily.clark@hospital.com'),
('David', 'Lee', 'Dermatologist', 'david.lee@hospital.com'),
('Sophia', 'Brown', 'General Practitioner', 'sophia.brown@hospital.com');

INSERT INTO Appointments (PatientID, DoctorID, AppointmentDate, ReasonForVisit, Status)
VALUES 
(1, 1, '2024-09-20', 'Routine checkup', 'Scheduled'),
(2, 2, '2024-09-21', 'Skin rash consultation', 'Scheduled'),
(3, 3, '2024-09-22', 'Flu symptoms', 'Completed');

INSERT INTO MedicalRecords (PatientID, DoctorID, Diagnosis, Treatment, RecordDate)
VALUES 
(1, 1, 'High blood pressure', 'Prescribed medication', '2024-09-20'),
(2, 2, 'Eczema', 'Topical ointment', '2024-09-21'),
(3, 3, 'Common flu', 'Rest and hydration', '2024-09-22');

INSERT INTO Prescriptions (PatientID, DoctorID, Medication, Dosage, PrescriptionDate)
VALUES 
(1, 1, 'Lisinopril', '10 mg daily', '2024-09-20'),
(2, 2, 'Hydrocortisone cream', 'Apply twice daily', '2024-09-21'),
(3, 3, 'Ibuprofen', '200 mg every 4-6 hours', '2024-09-22');
