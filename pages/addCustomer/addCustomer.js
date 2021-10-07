//onload loading section
$(function () {});

//section of fetching the area data by choosing the district

$("#customerDistrict").change(function () {
  let district_id = $("select#customerDistrict").val();
  console.log(district_id);

  //ajax requesting to server

  $.ajax({
    type: "post",
    url: "pages/addCustomer/areaFetchRequest.php",
    data: {
      districtId: district_id,
    },
    success: function (data) {
      //section for response of request
      $(".inputDisabled").prop("disabled", false); // Element(s) are now enabled.
      $("#customerArea").html(data);
    },
  });
});
// end section of fetching the area data by choosing the district

//section for creating the new customer for loan

$("#new_customer_creation").submit(function (event) {
  event.preventDefault();

          //global varible to check all are valid
          let valid_form_details = true;

          //setting the value of fields to null for validation
          $("#customerFirstName").removeClass("is-invalid");
          $("#customerLastName").removeClass("is-invalid");
          $("#customerPhoneNumber").removeClass("is-invalid");
          $("#customerEmail").removeClass("is-invalid");
          $("#customerAdharNo").removeClass("is-invalid");
          $("select#customerDistrict").removeClass("is-invalid");
          $("select#customerArea").removeClass("is-invalid");
          $("#customerAddress").removeClass("is-invalid");
          let phone_number_length = "";

          //section for getting the form value from the customer creation
          let customer_first_name = $("#customerFirstName").val();
          let customer_last_name = $("#customerLastName").val();
          let customer_phone_number = $("#customerPhoneNumber").val();
          let customer_mail = $("#customerEmail").val();
          let customer_adhar_no = $("#customerAdharNo").val();
          let customer_district = $("select#customerDistrict").val();
          let customer_area = $("select#customerArea").val();
          let customer_address = $("#customerAddress").val();

          //changing to uppercase
          first_name_to_upperCase = customer_first_name.toUpperCase();
          last_name_to_upperCase = customer_last_name.toUpperCase();
          adhar_no_to_upperCase = customer_adhar_no.toUpperCase();
          address_to_upperCase = customer_address.toUpperCase();
          //phone no valdation by count

          phone_number_length = customer_phone_number.length;

          //validation for the first name
          if (customer_first_name == "") {
            $("#customerFirstName").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("#customerFirstName").addClass("is-valid");
          }
          //validation for the last name
          if (customer_last_name == "") {
            $("#customerLastName").addClass("is-invalid");
            // valid_form_details = false;
          } else {
            $("#customerLastName").addClass("is-valid");
          }
          //validation for the phone number
          // if (customer_phone_number == ""||phone_number_length>10||phone_number_length<10||!$.isNumeric(customer_phone_number)) {
          //   $("#customerPhoneNumber").addClass("is-invalid");
          //   valid_form_details = false;
          // } else {
          //   $("#customerPhoneNumber").addClass("is-valid");
          // }
          //validation for the  customer district
          if (customer_district == 0) {
            $("select#customerDistrict").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("select#customerDistrict").addClass("is-valid");
          }
          //validation for the  customer area
          if (customer_area == 0) {
            $("select#customerArea").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("select#customerArea").addClass("is-valid");
          }
          //validation for the  customer address
          if (customer_address == "") {
            $("#customerAddress").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("#customerAddress").addClass("is-valid");
          }

          //section for insetion of a form new_customer_creation
          if (valid_form_details) {
            //ajax requesting to server

            $.ajax({
              type: "post",
              url: "pages/addCustomer/addCustomerRequest.php",
              data: {
                customerFirstName: customer_first_name,
                customerLastName: customer_last_name,
                customerphoneNumber: customer_phone_number,
                customerMail: customer_mail,
                customerAdharNo: customer_adhar_no,
                customerDistrict: customer_district,
                customerArea: customer_area,
                customerAddress: customer_address,
              },
              success: function (data) {
                //section for response of request

                if (data == 1) {
                  swal("Good job!", "You Created Customer Id", "success").then(() => {
                    window.location.href = "index.php?status=takeLoan&CUS_ID=0";
                  });
                } else {
                  swal("ALERT!", "CUSTOMER ALREADY EXITS", "warning").then(() => {
                    window.location.href = "index.php?status=addCustomer";
                  });
                }
              },
            });
  }
});


//section for adding customer
//section for creating the new customer for loan

$(".addcus").click(function (event) {
  event.preventDefault();

          //global varible to check all are valid
          let valid_form_details = true;

          //setting the value of fields to null for validation
          $("#customerFirstName").removeClass("is-invalid");
          $("#customerLastName").removeClass("is-invalid");
          $("#customerPhoneNumber").removeClass("is-invalid");
          $("#customerEmail").removeClass("is-invalid");
          $("#customerAdharNo").removeClass("is-invalid");
          $("select#customerDistrict").removeClass("is-invalid");
          $("select#customerArea").removeClass("is-invalid");
          $("#customerAddress").removeClass("is-invalid");
          let phone_number_length = "";

          //section for getting the form value from the customer creation
          let customer_first_name = $("#customerFirstName").val();
          let customer_last_name = $("#customerLastName").val();
          let customer_phone_number = $("#customerPhoneNumber").val();
          let customer_mail = $("#customerEmail").val();
          let customer_adhar_no = $("#customerAdharNo").val();
          let customer_district = $("select#customerDistrict").val();
          let customer_area = $("select#customerArea").val();
          let customer_address = $("#customerAddress").val();

          //changing to uppercase
          first_name_to_upperCase = customer_first_name.toUpperCase();
          last_name_to_upperCase = customer_last_name.toUpperCase();
          adhar_no_to_upperCase = customer_adhar_no.toUpperCase();
          address_to_upperCase = customer_address.toUpperCase();
          //phone no valdation by count

          phone_number_length = customer_phone_number.length;

          //validation for the first name
          if (customer_first_name == "") {
            $("#customerFirstName").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("#customerFirstName").addClass("is-valid");
          }
          //validation for the last name
          if (customer_last_name == "") {
            $("#customerLastName").addClass("is-invalid");
            // valid_form_details = false;
          } else {
            $("#customerLastName").addClass("is-valid");
          }
          //validation for the phone number
          // if (customer_phone_number == ""||phone_number_length>10||phone_number_length<10||!$.isNumeric(customer_phone_number)) {
          //   $("#customerPhoneNumber").addClass("is-invalid");
          //   valid_form_details = false;
          // } else {
          //   $("#customerPhoneNumber").addClass("is-valid");
          // }
          //validation for the  customer district
          if (customer_district == 0) {
            $("select#customerDistrict").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("select#customerDistrict").addClass("is-valid");
          }
          //validation for the  customer area
          if (customer_area == 0) {
            $("select#customerArea").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("select#customerArea").addClass("is-valid");
          }
          //validation for the  customer address
          if (customer_address == "") {
            $("#customerAddress").addClass("is-invalid");
            valid_form_details = false;
          } else {
            $("#customerAddress").addClass("is-valid");
          }

          //section for insetion of a form new_customer_creation
          if (valid_form_details) {
            //ajax requesting to server

            $.ajax({
              type: "post",
              url: "pages/addCustomer/addCustomerRequest.php",
              data: {
                customerFirstName: customer_first_name,
                customerLastName: customer_last_name,
                customerphoneNumber: customer_phone_number,
                customerMail: customer_mail,
                customerAdharNo: customer_adhar_no,
                customerDistrict: customer_district,
                customerArea: customer_area,
                customerAddress: customer_address,
              },
              success: function (data) {
                //section for response of request

                if (data == 1) {
                  swal("Good job!", "You Added New Customer", "success").then(() => {
                    window.location.href = "index.php";
                  });
                } else {
                  swal("ALERT!", "CUSTOMER ALREADY EXITS", "warning").then(() => {
                    window.location.href = "index.php?status=addCustomer";
                  });
                }
              },
            });
  }
});