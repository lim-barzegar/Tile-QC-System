CREATE DATABASE TileQC_DB;
GO
USE TileQC_DB;
GO

-- 1. جدول کوره
CREATE TABLE Kiln_Reports (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    ReportDate NVARCHAR(50),       
    Shift NVARCHAR(50),            
    DesignName NVARCHAR(100),      
    OperatorName NVARCHAR(100)     
);
GO

-- 2. جدول گزارش روزانه
CREATE TABLE Daily_QC (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    ReportDate NVARCHAR(50),        
    Shift NVARCHAR(50),             
    ControllerName NVARCHAR(100),   
    NonConformity NVARCHAR(MAX),    
    Defect NVARCHAR(MAX),           
    ActionTaken NVARCHAR(MAX),      
    TeamFormed NVARCHAR(10)         
);
GO

-- 3. جدول بالمیل
CREATE TABLE BallMill (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    ReportDate NVARCHAR(50),        
    Shift NVARCHAR(50),             
    MillNumber NVARCHAR(50),        
    MaterialMoisture NVARCHAR(50),  
    SlipDensity NVARCHAR(50),       
    SlipViscosity NVARCHAR(50),     
    Residue NVARCHAR(50),           
    Notes NVARCHAR(MAX)             
);
GO

-- 4. جدول خط لعاب
CREATE TABLE GlazeLine (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    ReportDate NVARCHAR(50),
    Shift NVARCHAR(50),
    ControllerName NVARCHAR(100),
    NormalSlipWeight NVARCHAR(50),    
    EngobeDensity NVARCHAR(50),       
    EngobeViscosity NVARCHAR(50),     
    GlazeDensity NVARCHAR(50),        
    GlazeViscosity NVARCHAR(50),      
    WaterWeight NVARCHAR(50)          
);
GO

-- 5. جدول اسپری
CREATE TABLE SprayDryer (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    ReportDate NVARCHAR(50),
    Shift NVARCHAR(50),
    SprayNumber NVARCHAR(50),
    BodyFormula NVARCHAR(50),       
    BodyResidue NVARCHAR(50),       
    TempIn NVARCHAR(50),            
    TempOut NVARCHAR(50),           
    GranuleMoisture NVARCHAR(50),   
    GranuleDensity NVARCHAR(50)     
);
GO