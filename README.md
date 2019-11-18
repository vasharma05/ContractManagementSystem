# ContractManagementSystem
A Contract Management System that was built by me as an intern in Telecommunications India Ltd..

Project Screenshots and their Desription

Register Page
The Registration page inputs the details of the new employee on the system and enters the details into the Database.

![Register Page]](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Register.PNG)

Login Page
The Login Page/Home Page consists of 2 fields Employee ID, Password. On Failure, it will alert ‘No User Found’, else on success it will direct to the admin page, with Enabling the session_start() function and the Employee Name and Employee ID who logged in.

![Login Page](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Login.PNG)

Admin Page
After logging in, the user will be directed to this page wherein he can see his name on the top right corner, and in default the Reports Section will be visible wherein he can view all the Clients/ vendors’ details entered previously.

Add Client Section
This section will slide down when “Add Vendors” button is clicked and will show a form wherein the admin can enter the Details of the new Client.

![Add Clients](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Add%20Clients.PNG)

Add Vendor Section
This section will show a form wherein the admin can enter the Details of the new Client.

![Add Vendors](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Add%20Vendors.PNG)

EDIT/UPDATE SECTION
In this section first the admin will select whose details are to be Updated and will select from the select box. After selecting one of these and entering the Unique ID he/she can view their current details and can edit the field he/she wants to update.

![Edit Vendors](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Edit%20Vendor.PNG)

![Edit Clients](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Edit%20Client.PNG)

![Edit Clients](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Edit%20Client%20Open.PNG)

ADDITIONAL FEATURES
1. In the reports section, whenever a contract’s end date is near to the Current date, the corresponding column’s background color will change, in the below manner:
2. If the difference between the Contract’s End Date and the current date is of more than 15 days, the background color will become Orange.

![Orange](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Orange.PNG)

3. If the difference between the Contract’s End Date and the current date is of 15 days or less, the background color will become Red and an automatic Email will be sent to the particular client/ Vendor.

![Red](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/Red.PNG)

4. The Unique ID in the Addition of Client/ Vendor Section is a random 5 digit number and cannot be editted.

![](https://github.com/vasharma05/ContractManagementSystem/blob/master/Screenshots/image.0YXIB0.png)

5. The Period Part in the Addition of client/Vendor Section will automatically show the difference between the Start Date and the End Date.

6. When we change the option from Client to vendor or vice-versa while adding the corresponding information, the Work No. and the Client Date is visible when Client is chosen and is not applicable when Vendor is selected as can be distinguished in the pictures shown above.

7. The similar feature is present when the Confirmation From Bank is chosen to ‘Yes’, the Confirmation Date will show up otherwise it won’t be visible when chosen to ‘No’.
