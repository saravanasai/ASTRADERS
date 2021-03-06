




//query updated on database till lived on new requirements 16-07-2022

step 1: remove trigger `insert on update to transaction` on collection list table 

step 2: make default null on loanTransaction Table 

        ALTER TABLE `loanTransaction` CHANGE `TR_AMOUNT_PAID_INITIAL` `TR_AMOUNT_PAID_INITIAL` BIGINT(20) NULL DEFAULT NULL; 

step 3 : update `todayTransactionView`

       
        CREATE VIEW todayTransactionView AS
                  SELECT 
                   loanTransaction.TR_ID,
                   loanTransaction.TR_LN_ID,
                   loanTransaction.TR_AMOUNT_PAID,
                   loanTransaction.TR_AMOUNT_BALANCE,
                   loanTransaction.TR_DATE,
                   loanTransaction.TR_COMMIT_STATUS,
                   customermaster.CUSTOMER_ID,
                   customermaster.CUSTOMER_FIRST_NAME,
                   customermaster.CUSTOMER_PHONE_NUMBER,
                   districts.DISTRICT_NAME,
                   areas.AREA_NAME,
                   areas.AREA_ID,
                   districts.DISTRICT_ID,
                   loanTransaction.TR_TIME,
                   loanTransaction.TR_DONE_ON
                  
                   
                  FROM customermaster,loanTransaction,areas,districts
                 WHERE 
                         loanTransaction.TR_OF_CUSTOMER=customermaster.CUSTOMER_ID
                         AND districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT AND
                         areas.AREA_ID=customermaster.CUSTOMER_CITY ;



//adding one more column in customer master table
ALTER TABLE `customermaster` ADD `CUSTOMER_IMAGE` VARCHAR(265) NULL DEFAULT NULL AFTER `CUSTOMER_STATUS`;



//editing the customerMasterView view table 

//use this on live if you cannot edit views 
CREATE VIEW customerMasterView AS SELECT customermaster.*, districts.DISTRICT_NAME, areas.AREA_NAME, areas.AREA_ID, districts.DISTRICT_ID FROM customermaster,districts,areas WHERE districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT AND areas.AREA_ID=customermaster.CUSTOMER_CITY 



SELECT
    `testemi`.`areas`.`AREA_ID` AS `AREA_ID`,
    `testemi`.`areas`.`AREA_NAME` AS `AREA_NAME`,
    `testemi`.`areas`.`AREA_DISTRICT` AS `AREA_DISTRICT`,
    `testemi`.`agents_to_area`.`AG_TO_AREA_ID` AS `AG_TO_AREA_ID`,
    `testemi`.`agents_to_area`.`AREA_ID_AG` AS `AREA_ID_AG`,
    `testemi`.`agents_to_area`.`AREA_TO_DISTRICT` AS `AREA_TO_DISTRICT`,
    `testemi`.`agents_to_area`.`AREA_TO_AGENT` AS `AREA_TO_AGENT`,
    `testemi`.`districts`.`DISTRICT_ID` AS `DISTRICT_ID`,
    `testemi`.`districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`,
    `testemi`.`agents`.`AGENT_ID` AS `AGENT_ID`,
    `testemi`.`agents`.`AGENT_NAME` AS `AGENT_NAME`,
    `testemi`.`agents`.`AGENT_ADDRESS` AS `AGENT_ADDRESS`,
    `testemi`.`agents`.`AGENT_ADHAR_NO` AS `AGENT_ADHAR_NO`,
    `testemi`.`agents`.`AGENT_PHONE_NUMBER` AS `AGENT_PHONE_NUMBER`,
    `testemi`.`agents`.`AGENT_FOR_CITY` AS `AGENT_FOR_CITY`,
    `testemi`.`agents`.`AGENT_STATUS` AS `AGENT_STATUS`
FROM
    (
        (
            (
                `testemi`.`areas`
            JOIN `testemi`.`agents_to_area`
            )
        JOIN `testemi`.`districts`
        )
    JOIN `testemi`.`agents`
    )
WHERE
    `testemi`.`areas`.`AREA_ID` = `testemi`.`agents_to_area`.`AREA_ID_AG` AND `testemi`.`areas`.`AREA_DISTRICT` = `testemi`.`agents_to_area`.`AREA_TO_DISTRICT` AND `testemi`.`agents_to_area`.`AREA_TO_DISTRICT` = `testemi`.`districts`.`DISTRICT_ID` AND `testemi`.`agents_to_area`.`AREA_TO_AGENT` = `testemi`.`agents`.`AGENT_ID`

//updating database column for default user image 

    UPDATE `customermaster` SET `CUSTOMER_IMAGE`='user.png' WHERE 1; 


//updating CollectionListView to adding the CUSTOMER_IMAGE column 

-- on live 

CREATE VIEW collectionListView AS
                    SELECT 
                      customermaster.CUSTOMER_ID,
                      customermaster.CUSTOMER_ADDRESS,
                      customermaster.CUSTOMER_IMAGE,
                      loanMaster.LOAN_ID,
                      customermaster.CUSTOMER_FIRST_NAME,
                      customermaster.CUSTOMER_PHONE_NUMBER,
                      customermaster.CUSTOMER_REMARK,
                      districts.DISTRICT_NAME,
                       products.PRODUCT_NAME,
                      loanMaster.LN_PRODUCT_QUANTITY,
                      loanMaster.LN_TAB_TOTAL_AMOUNT,
                      loanMaster.LN_TAB_BALANCE_AMOUNT,
                      loanMaster.LN_STATUS,
                      loanMaster.LN_ON_DATE,
                      collectionList.COLLECTION_BALANCE_AMOUNT,
                      areas.AREA_NAME,
                      areas.AREA_ID,
                      districts.DISTRICT_ID,
                      collectionList.COLLECTION_ON_DATE
                      FROM loanMaster,districts,customermaster,products,collectionList,areas
                    WHERE districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT AND 
                          products.PRODUCT_ID=loanMaster.LN_TO_PRODUCT AND
                          loanMaster.LN_TAB_BALANCE_AMOUNT>0 AND
                          loanMaster.LN_TO_CUSTOMER=customermaster.CUSTOMER_ID AND    collectionList.COLLECTION_LN_ID=loanMaster.LOAN_ID AND areas.AREA_ID=customermaster.CUSTOMER_CITY; 
                          



-- on local 

SELECT
    `testemi`.`customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`,
    `testemi`.`customermaster`.`CUSTOMER_IMAGE` AS `CUSTOMER_IMAGE`,
    `testemi`.`loanMaster`.`LOAN_ID` AS `LOAN_ID`,
    `testemi`.`customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`,
    `testemi`.`customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`,
    `testemi`.`customermaster`.`CUSTOMER_REMARK` AS `CUSTOMER_REMARK`,
    `testemi`.`districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`,
    `testemi`.`products`.`PRODUCT_NAME` AS `PRODUCT_NAME`,
    `testemi`.`loanMaster`.`LN_PRODUCT_QUANTITY` AS `LN_PRODUCT_QUANTITY`,
    `testemi`.`loanMaster`.`LN_TAB_TOTAL_AMOUNT` AS `LN_TAB_TOTAL_AMOUNT`,
    `testemi`.`loanMaster`.`LN_TAB_BALANCE_AMOUNT` AS `LN_TAB_BALANCE_AMOUNT`,
    `testemi`.`loanMaster`.`LN_STATUS` AS `LN_STATUS`,
    `testemi`.`loanMaster`.`LN_ON_DATE` AS `LN_ON_DATE`,
    `testemi`.`collectionList`.`COLLECTION_BALANCE_AMOUNT` AS `COLLECTION_BALANCE_AMOUNT`,
    `testemi`.`areas`.`AREA_NAME` AS `AREA_NAME`,
    `testemi`.`areas`.`AREA_ID` AS `AREA_ID`,
    `testemi`.`districts`.`DISTRICT_ID` AS `DISTRICT_ID`,
    `testemi`.`collectionList`.`COLLECTION_ON_DATE` AS `COLLECTION_ON_DATE`
FROM
    (
        (
            (
                (
                    (
                        `testemi`.`loanMaster`
                    JOIN `testemi`.`districts`
                    )
                JOIN `testemi`.`customermaster`
                )
            JOIN `testemi`.`products`
            )
        JOIN `testemi`.`collectionList`
        )
    JOIN `testemi`.`areas`
    )
WHERE
    `testemi`.`districts`.`DISTRICT_ID` = `testemi`.`customermaster`.`CUSTOMER_DISTRICT` AND `testemi`.`products`.`PRODUCT_ID` = `testemi`.`loanMaster`.`LN_TO_PRODUCT` AND `testemi`.`loanMaster`.`LN_TAB_BALANCE_AMOUNT` > 0 AND `testemi`.`loanMaster`.`LN_TO_CUSTOMER` = `testemi`.`customermaster`.`CUSTOMER_ID` AND `testemi`.`collectionList`.`COLLECTION_LN_ID` = `testemi`.`loanMaster`.`LOAN_ID` AND `testemi`.`areas`.`AREA_ID` = `testemi`.`customermaster`.`CUSTOMER_CITY`













//this all are old querys modified the database Completed

ALTER TABLE `agents` ADD `PASSWORD` VARCHAR(255) NULL DEFAULT NULL AFTER `AGENT_PHONE_NUMBER`;

???//Query for adding password


 



             //EMI MANAGEMENT SYSTEM QUERYS 
 
         
               //CREATION OF LOAN MASTER TABLE 
 
               
               CREATE TABLE loanMaster(
   
                    LOAN_ID BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    LN_TO_CUSTOMER BIGINT ,
                    LN_TO_PRODUCT BIGINT,
                    LN_PRODUCT_QUANTITY BIGINT,
                    LN_TAB_TOTAL_AMOUNT VARCHAR(50),
                    LN_TAB_INITIAL_AMOUNT VARCHAR(50),
                    LN_TAB_BALANCE_AMOUNT VARCHAR(50),
                    LN_STATUS INT ,
                    LN_ON_DATE DATE ,
                    LN_ON_TIME TIME,
                    FOREIGN KEY (LN_TO_CUSTOMER) REFERENCES customermaster(CUSTOMER_ID),
                    FOREIGN KEY (LN_TO_PRODUCT) REFERENCES products(PRODUCT_ID)
                    );

            //CREATION OF THE SALES TABLE 
    
                    CREATE TABLE sales(

                  SALE_ID BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                  SALE_PRODUCT BIGINT ,
                  SALE_PRODUCT_TO_CUSTOMER BIGINT,
                  SALE_PRODUCT_QUANTITY BIGINT,
                  SALE_TOTAL_AMOUNT BIGINT,
                  SALE_PRODUCT_INITIAL_PAYMENT BIGINT,
                  SALE_PRODUCT_BALANCE_PAYMENT BIGINT,
                  SALE_ON_DATE DATE,
                  SALE_ON_TIME TIME,
                  FOREIGN KEY (SALE_PRODUCT) REFERENCES products(PRODUCT_ID),
                  FOREIGN KEY (SALE_PRODUCT_TO_CUSTOMER) REFERENCES customermaster(CUSTOMER_ID)
                  
                );


            //TRIGGER TO UPDATE THE PRODUCTS TABLE TO REDUCE THE PRODUCT QUANTITY

                        //ADDING TO SALES TABLE ON GUI
                UPDATE `products` SET `PRODUCT_QUANTITY`= NEW.SALE_PRODUCT_QUANTITY WHERE PRODUCT_ID=NEW.SALE_PRODUCT

                       //ADDING BY QUERY
                DROP TRIGGER IF EXISTS `update_product_table`;CREATE DEFINER=`root`@`localhost` TRIGGER `update_product_table` AFTER INSERT ON `sales` 
                FOR EACH ROW UPDATE `products` SET `PRODUCT_QUANTITY`=`PRODUCT_QUANTITY`-NEW.SALE_PRODUCT_QUANTITY WHERE PRODUCT_ID=NEW.SALE_PRODUCT 
 
          
          
            //TRIGGER FOR INSERT INTO SALES TABLE ON LOANMASTER TABLE INSERT
 
                       //ADDING TO LOAN MASTER TABLE ON GUI
                
                           INSERT INTO `sales`(
                          `SALE_PRODUCT`,
                         ` SALE_PRODUCT_TO_CUSTOMER`, `SALE_PRODUCT_QUANTITY`, 
                        `SALE_TOTAL_AMOUNT`, `SALE_PRODUCT_INITIAL_PAYMENT`, `SALE_PRODUCT_BALANCE_PAYMENT`)
                           VALUES (
                        NEW.LN_TO_PRODUCT ,
                        NEW.LN_TO_CUSTOMER,
                        NEW.LN_PRODUCT_QUANTITY,
                        NEW.LN_TAB_TOTAL_AMOUNT ,
                        NEW.LN_TAB_INITIAL_AMOUNT ,
                        NEW.LN_TAB_BALANCE_AMOUNT 	
                    )
                
                     //ADDING BY QUERY
    
                     DROP TRIGGER IF EXISTS `add_to_salestable`;CREATE DEFINER=`root`@`localhost` TRIGGER `add_to_salestable` AFTER INSERT ON `loanMaster` 
                    FOR EACH ROW INSERT INTO `sales`( `SALE_PRODUCT`, `SALE_PRODUCT_TO_CUSTOMER`, `SALE_PRODUCT_QUANTITY`,
                    `SALE_TOTAL_AMOUNT`, `SALE_PRODUCT_INITIAL_PAYMENT`,  `SALE_PRODUCT_BALANCE_PAYMENT`) VALUES ( NEW.LN_TO_PRODUCT ,   NEW.LN_TO_CUSTOMER,             
                    NEW.LN_PRODUCT_QUANTITY,
                      NEW.LN_TAB_TOTAL_AMOUNT , 
                    NEW.LN_TAB_INITIAL_AMOUNT , NEW.LN_TAB_BALANCE_AMOUNT ) 


          //CREATION OF COLLECTION LIST TABLE 
 
                
                         
                CREATE TABLE collectionList(
                 
                
                       
                COLLECTION_ID BIGINT  PRIMARY KEY AUTO_INCREMENT,
                COLLECTION_TO_CUSTOMER BIGINT,
                COLLECTION_TO_PRODUCT BIGINT,
                COLLECTION_TOTAL_AMOUNT VARCHAR(50),
                COLLECTION_LAST_AMOUNT_PAID BIGINT,
                COLLECTION_BALANCE_AMOUNT VARCHAR(50),
                COLLECTION_ON_DATE DATE COMMENT "NEXT COLLECTION DATE ADDED ON DATE OF CREATION",
                COLLECTION_STATUS INT ,
                FOREIGN KEY (COLLECTION_TO_CUSTOMER) REFERENCES  customermaster(CUSTOMER_ID),
                FOREIGN KEY (COLLECTION_TO_PRODUCT) REFERENCES  products(PRODUCT_ID)
                
                );



          //TRIGGERS TO INSERT A VALUE INTO COLECTION LIST TABLE FROM LOAN MASTER TABLE INSERT 
 
               //QUERY ON GUI 
        
               INSERT INTO `loanTransaction`(
                        `TR_LN_ID`,
                        `TR_OF_CUSTOMER`, 
                        `TR_TO_PRODUCT`,
                        `TR_AMOUNT_PAID`,
                         `TR_AMOUNT_PAID_INITIAL`,
                        `TR_AMOUNT_BALANCE`) 
                        VALUES (
                           
              
                        NEW.COLLECTION_LN_ID,                         
                        NEW.COLLECTION_TO_CUSTOMER,
                        NEW.COLLECTION_TO_PRODUCT,
                          
                        NEW.COLLECTION_TOTAL_AMOUNT,
                        NEW.COLLECTION_LAST_AMOUNT_PAID,
                        NEW.COLLECTION_BALANCE_AMOUNT
 )
             

                //creation of view for the collection list
  
              
CREATE VIEW collectionListView AS
                    SELECT 
                      customermaster.CUSTOMER_ID,
                      customermaster.CUSTOMER_IMAGE,
                      loanMaster.LOAN_ID,
                      customermaster.CUSTOMER_FIRST_NAME,
                      customermaster.CUSTOMER_PHONE_NUMBER,
                      customermaster.CUSTOMER_REMARK,
                      districts.DISTRICT_NAME,
                       products.PRODUCT_NAME,
                      loanMaster.LN_PRODUCT_QUANTITY,
                      loanMaster.LN_TAB_TOTAL_AMOUNT,
                      loanMaster.LN_TAB_BALANCE_AMOUNT,
                      loanMaster.LN_STATUS,
                      loanMaster.LN_ON_DATE,
                      collectionList.COLLECTION_BALANCE_AMOUNT,
                      areas.AREA_NAME,
                      areas.AREA_ID,
                      districts.DISTRICT_ID,
                      collectionList.COLLECTION_ON_DATE
                      FROM loanMaster,districts,customermaster,products,collectionList,areas
                    WHERE districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT AND 
                          products.PRODUCT_ID=loanMaster.LN_TO_PRODUCT AND
                          loanMaster.LN_TAB_BALANCE_AMOUNT>0 AND
                          loanMaster.LN_TO_CUSTOMER=customermaster.CUSTOMER_ID AND    collectionList.COLLECTION_LN_ID=loanMaster.LOAN_ID AND areas.AREA_ID=customermaster.CUSTOMER_CITY; 



       //CREATION OF TABLE TRANSACTION 
 
        CREATE TABLE loanTransaction (

          TR_ID BIGINT AUTO_INCREMENT NOT NULL PRIMARY KEY,
          TR_OF_CUSTOMER BIGINT,
          TR_TO_PRODUCT BIGINT,
          TR_AMOUNT_PAID BIGINT,
          TR_AMOUNT_BALANCE BIGINT,
          TR_DATE DATE,
          TR_TIME TIME ,
           FOREIGN KEY (TR_OF_CUSTOMER) REFERENCES customermaster(CUSTOMER_ID),
             FOREIGN KEY (TR_TO_PRODUCT) REFERENCES products(PRODUCT_ID)
           );

   
    //VIEW CREATION  VIEW FOR CUSTOMERMASTER VIEW

               CREATE VIEW customerMasterView AS
                  SELECT 
                 customermaster.*,
                 districts.DISTRICT_NAME,
                 areas.AREA_NAME,
                 areas.AREA_ID,
                 districts.DISTRICT_ID
                 FROM customermaster,districts,areas
                 WHERE districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT 
                 AND areas.AREA_ID=customermaster.CUSTOMER_CITY; 

   //VIEW CREATION FOR  CUSTOMER TRASACTION VIEW


             CREATE VIEW customerTransactionView AS
                  SELECT 
                  customermaster.CUSTOMER_FIRST_NAME,
                  customermaster.CUSTOMER_LAST_NAME,
                  customermaster.CUSTOMER_ID,
                  customermaster.CUSTOMER_PHONE_NUMBER,
                  products.PRODUCT_NAME,
                  products.PRODUCT_MODEL_NO,
                  products.PRODUCT_PRICE,
                  loanMaster.LN_PRODUCT_QUANTITY,
                  loanMaster.LOAN_ID,
                   loanTransaction.TR_AMOUNT_PAID,
                   loanTransaction.TR_AMOUNT_BALANCE,
                   loanTransaction.TR_DATE,
                   loanTransaction.TR_TIME,
                   loanTransaction.TR_OF_CUSTOMER,
                   loanTransaction.TR_AMOUNT_PAID_INITIAL,
                   loanTransaction.TR_COMMIT_STATUS
                  
                 
                 FROM customermaster,products,loanMaster,loanTransaction
                 WHERE loanTransaction.TR_LN_ID=loanMaster.LOAN_ID AND 
                 loanTransaction.TR_OF_CUSTOMER=customermaster.CUSTOMER_ID AND
                 loanTransaction.TR_TO_PRODUCT=products.PRODUCT_ID;






         ///TRIGERS FOR UPDATING THE LOAN MASTER AFTER UPDATING COLLECTION LIST
            
                          UPDATE `loanMaster` SET `LN_TAB_BALANCE_AMOUNT`=NEW.COLLECTION_BALANCE_AMOUNT  WHERE LN_TO_CUSTOMER =NEW.COLLECTION_TO_CUSTOMER AND
                            LOAN_ID=NEW.COLLECTION_LN_ID 


 

        //TRIGGERS FOR INSERTING INTO TRANSACTION TABLE AFTER INSERTING INTO LOANMASTER
           INSERT INTO `loanTransaction`(
                    `TR_LN_ID`, 
                    `TR_OF_CUSTOMER`, 
                    `TR_TO_PRODUCT`,
                    `TR_AMOUNT_PAID`, 
                    `TR_AMOUNT_PAID_INITIAL`,
                    `TR_AMOUNT_BALANCE`
                    )
                    VALUES 
                    (
                     NEW.LOAN_ID,
                     NEW.LN_TO_CUSTOMER,
                     NEW.LN_TO_PRODUCT,
                     NEW.LN_TAB_TOTAL_AMOUNT,
                     NEW.LN_TAB_INITIAL_AMOUNT,
                     NEW.LN_TAB_BALANCE_AMOUNT
                    )




//TRIGGER FOR UPDATING THE COLLECTION LIST TABLE AFTER INSERTNG INTO LOAN MASTER
 
  INSERT INTO `collectionList`( 
    ` COLLECTION_LN_ID `,
    `COLLECTION_TO_CUSTOMER`, `COLLECTION_TO_PRODUCT`, `COLLECTION_TOTAL_AMOUNT`, 
`COLLECTION_LAST_AMOUNT_PAID`,               `COLLECTION_BALANCE_AMOUNT`, `COLLECTION_ON_DATE`,
`COLLECTION_STATUS`)
 VALUES ( 
    NEW.LOAN_ID ,
    NEW.LN_TO_CUSTOMER ,
    NEW.LN_TO_PRODUCT,
    NEW.LN_TAB_TOTAL_AMOUNT ,
    NEW.LN_TAB_INITIAL_AMOUNT ,                 NEW.LN_TAB_BALANCE_AMOUNT,
    DATE_ADD(NEW.LN_ON_DATE  , INTERVAL 7 DAY),
    NEW.LN_STATUS 
)

 


   ///todaytransaction view creation QUERY
        CREATE VIEW todayTransactionView AS
                  SELECT 
                   loanTransaction.TR_ID,
                   loanTransaction.TR_LN_ID,
                   loanTransaction.TR_AMOUNT_PAID,
                   loanTransaction.TR_AMOUNT_BALANCE,
                   loanTransaction.TR_DATE,
                   loanTransaction.TR_COMMIT_STATUS,
                   customermaster.CUSTOMER_ID,
                   customermaster.CUSTOMER_FIRST_NAME,
                   customermaster.CUSTOMER_PHONE_NUMBER,
                   districts.DISTRICT_NAME,
                   areas.AREA_NAME,
                   areas.AREA_ID,
                   districts.DISTRICT_ID,
                   products.PRODUCT_NAME,
                   loanTransaction.TR_TIME,
                   loanTransaction.TR_DONE_ON
                  
                   
                  FROM customermaster,loanTransaction,areas,districts,products
                 WHERE 
                         loanTransaction.TR_OF_CUSTOMER=customermaster.CUSTOMER_ID
                         AND districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT AND
                         areas.AREA_ID=customermaster.CUSTOMER_CITY ;

   
   //craeting the salesReportview 

   CREATE VIEW salesReportView AS
    SELECT
    sales.SALE_ID,
    sales.SALE_TOTAL_AMOUNT,
    sales.SALE_PRODUCT_INITIAL_PAYMENT,
    sales.SALE_ON_DATE,
    customermaster.CUSTOMER_FIRST_NAME,
    customermaster.CUSTOMER_LAST_NAME,
    customermaster.CUSTOMER_ID
    FROM sales,customermaster
    WHERE sales.SALE_PRODUCT_TO_CUSTOMER=customermaster.CUSTOMER_ID;

   // creation of view collectionZeroBalance List view
    
       CREATE VIEW customerZeroBalanceListView AS
                SELECT 
                 customermaster.CUSTOMER_ID,
                 customermaster.CUSTOMER_FIRST_NAME,
                 customermaster.CUSTOMER_LAST_NAME,
                 customermaster.CUSTOMER_PHONE_NUMBER,
                 districts.DISTRICT_NAME,
                 areas.AREA_NAME,
                 areas.AREA_ID,
                 districts.DISTRICT_ID,
                 customermaster.CUSTOMER_STATUS,
                 collectionList.COLLECTION_BALANCE_AMOUNT
                 FROM customermaster,districts,areas,collectionList
                 WHERE districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT 
                 AND areas.AREA_ID=customermaster.CUSTOMER_CITY AND customermaster.CUSTOMER_ID=collectionList.COLLECTION_TO_CUSTOMER AND collectionList.COLLECTION_BALANCE_AMOUNT=0; 

   // endof creation of view collectionZeroBalance List view 


//TRIGGER TO UPDATE VALUE ON LOAN_MASTER TABLE IF TRANSACTION TABLE ALTERED
       
        //GUI QUERY 
            UPDATE `loanMaster` SET `LN_TAB_BALANCE_AMOUNT`=NEW.TR_AMOUNT_BALANCE
            WHERE `LOAN_ID`=NEW.TR_LN_ID  AND `LN_TO_CUSTOMER`=NEW.TR_OF_CUSTOMER 


//TRIGGER TO UPDATE VALUE ON THE COLLECTION LIST IF TRANSACTION IS UPDATED

  UPDATE `collectionList` SET `COLLECTION_LAST_AMOUNT_PAID`=NEW. 	TR_AMOUNT_PAID 
,`COLLECTION_BALANCE_AMOUNT`= NEW.TR_AMOUNT_BALANCE 
WHERE 
`COLLECTION_LN_ID`=NEW.TR_LN_ID 
  AND 
`COLLECTION_TO_CUSTOMER`=NEW.TR_OF_CUSTOMER 


   //QUERY TO UPDATE LOANMASTER IF TRANSACTION IS UPDATED 
         UPDATE `loanTransaction` SET `TR_AMOUNT_PAID`=200,`TR_AMOUNT_BALANCE`=100 WHERE `TR_ID`=34




//TRIGER TO LOANMASTER IF THE TRANSACTION IS UPDATED
      UPDATE `collectionList` 
SET 
`COLLECTION_BALANCE_AMOUNT`= 
NEW.LN_TAB_BALANCE_AMOUNT,


`COLLECTION_STATUS`=1 
WHERE 
`COLLECTION_LN_ID`=NEW.LOAN_ID  
AND 
`COLLECTION_TO_CUSTOMER`=NEW.LN_TO_CUSTOMER 


//TODAY TOTAL SALES  SUM QUERY

    SELECT SUM(`TR_AMOUNT_PAID`) FROM `loanTransaction` WHERE `TR_COMMIT_STATUS`=1; 
  




//AREA TO AGENT TABLE CREATTION 

 CREATE TABLE agents_to_area(
    
     AG_TO_AREA_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     AREA_ID_AG INT ,
     AREA_TO_DISTRICT INT,
     AREA_TO_AGENT INT,
     FOREIGN KEY (AREA_ID_AG) REFERENCES areas(AREA_ID),
     FOREIGN KEY ( AREA_TO_DISTRICT) REFERENCES districts(DISTRICT_ID),
     FOREIGN KEY (AREA_TO_AGENT) REFERENCES agents(AGENT_ID)
    
);

  //TRIGGES
//ADD TO AGENTS FOR AREA IN ON TRIGGER 
 
    INSERT INTO `agents_to_area`
( `AREA_ID`, `AREA_T_DISTRICT`)
VALUES (
    NEW.AREA_ID,
    NEW.AREA_DISTRICT
   )


view creation query for agents for areas
CREATE VIEW agents_to_area_view AS
SELECT *
FROM areas,agents_to_area,districts,agents
WHERE areas.AREA_ID=agents_to_area.AREA_ID_AG 
AND areas.AREA_DISTRICT=agents_to_area.AREA_TO_DISTRICT
AND agents_to_area.AREA_TO_DISTRICT=districts.DISTRICT_ID
AND agents_to_area.AREA_TO_AGENT=agents.AGENT_ID;



CREATE VIEW agents_to_area_view AS
SELECT *
FROM areas,agents_to_area,districts,agents
WHERE areas.AREA_ID=agents_to_area.AREA_ID_AG 
AND areas.AREA_DISTRICT=agents_to_area.AREA_TO_DISTRICT
AND agents_to_area.AREA_TO_DISTRICT=districts.DISTRICT_ID
AND (agents_to_area.AREA_TO_AGENT=agents.AGENT_ID
OR `AREA_TO_AGENT`IS NULL);





//CREATEION OF OEDERITEM TABLE 

CREATE TABLE orderItemMaster (
    OR_IT_ID BIGINT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    OR_TO_LN_ID BIGINT DEFAULT NULL COMMENT "THIS ORDER ITEM IS BELONGS TO",
    OR_OF_CUS BIGINT,
    OR_OF_PR_ID BIGINT,
    OR_OF_PR_QUANTITY BIGINT,
    OR_BILL_STATUS INT DEFAULT 1 COMMENT "THIS SHOWS THE ORDER ITEMS OF CURRENT BILL",
	FOREIGN KEY (OR_OF_CUS) REFERENCES customermaster(CUSTOMER_ID),
    FOREIGN KEY (OR_OF_PR_ID) REFERENCES products(PRODUCT_ID),
    FOREIGN KEY (OR_TO_LN_ID) REFERENCES  loanMaster(LOAN_ID)
);



**************************changes done on new admin panel requirement 01-04-2022****************************************

CREATE VIEW todayTransactionViewWithAgents AS
                  SELECT 
                   loanTransaction.TR_ID,
                   loanTransaction.TR_LN_ID,
                   loanTransaction.TR_AMOUNT_PAID,
                   loanTransaction.TR_AMOUNT_BALANCE,
                   loanTransaction.TR_COMMIT_STATUS,
                   loanTransaction.TR_DATE,
                   loanTransaction.TR_DONE_ON,
                   customermaster.CUSTOMER_FIRST_NAME,
                   customermaster.CUSTOMER_LAST_NAME,
                   customermaster.CUSTOMER_PHONE_NUMBER,
                   customermaster.CUSTOMER_ID,
                   agents.AGENT_NAME,
                   agents.AGENT_PHONE_NUMBER,
                   districts.DISTRICT_NAME,
                   areas.AREA_NAME
                  FROM loanTransaction INNER JOIN customermaster on customermaster.CUSTOMER_ID=loanTransaction.TR_OF_CUSTOMER
                  LEFT JOIN agents ON agents.AGENT_ID=loanTransaction.TR_DONE_ON,districts,areas  
                  WHERE 
                       	 districts.DISTRICT_ID=customermaster.CUSTOMER_DISTRICT 
                         AND areas.AREA_ID=customermaster.CUSTOMER_CITY ;


********changes done in loan master table to add a discount infomation to table 

ALTER TABLE `loanMaster` ADD `LN_TAB_DISCOUNT` BIGINT NULL DEFAULT NULL AFTER `LN_TAB_TOTAL_AMOUNT`;

**********TILL THI ALL ARE TESTED & ADDED WORKING PROPERLY ON LIVE************

//Changes Done on Database level to add transaction date Custom 18/04/2022 --

ALTER TABLE `collectionList` ADD `COLLECTED_ON_DATE` DATE NULL DEFAULT NULL AFTER `COLLECTION_ON_DATE`;


modified trigger for update on collection list insert into loanTransaction
INSERT INTO `loanTransaction`(
`TR_LN_ID`,
`TR_OF_CUSTOMER`, 
`TR_TO_PRODUCT`,
`TR_AMOUNT_PAID_INITIAL`,
`TR_AMOUNT_PAID`, 
`TR_AMOUNT_BALANCE`,
`TR_DONE_ON`,
`TR_DATE`
) 
VALUES (
NEW.COLLECTION_LN_ID ,                        NEW.COLLECTION_TO_CUSTOMER,                    NEW.COLLECTION_TO_PRODUCT,
NEW.COLLECTION_TOTAL_AMOUNT ,                  NEW.COLLECTION_LAST_AMOUNT_PAID,              NEW.COLLECTION_BALANCE_AMOUNT,
NEW.PAID_ON,
NEW.COLLECTED_ON_DATE
)