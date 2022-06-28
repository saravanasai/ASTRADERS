<?php
include_once("./assets/css_links.php");
//adding a database config file
include_once("./config.php");

//SECTION FOR FETCHING THE DATA FROM AREAS TABLE

$sql = "SELECT  * FROM districts";
$stmt = $conn->prepare($sql);
$stmt->execute();
$district_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching
?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">PRODUCT RETURN FORM</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="new_customer_creation">
                    <div class="card-body" x-data="{

                        transactions:[],
                        loanData:[],
                        tableShow:false,
                        loanId:'',
                        returnProductRequest(orderId){

                            swal({
                            title: ' Are you sure?', 
                            text: 'Once deleted, you will not be able to roll Back!' , 
                            icon: 'warning' , 
                            buttons: true, 
                            dangerMode: true, 
                                }).then((willDelete)=> {

                                    if (willDelete) {

                                        let data= new FormData()

                                        data.append('orderId',orderId)


                                        axios.post('pages/productReturn/returnProductRequest.php',data)
                                                .then((e)=>{
                                                
                                                if(e.data.data)
                                                {   
                                                    swal('Completed');
                                                    this.getTransactionInfo()
                                                }
                                                else
                                                {
                                                    swal('Cannot Complete the process refund amount should be greater than balance amount');
                                                }
                                               
                                            })

                                        

                                    } else {
                                            
                                            swal('NO CHANGES HAD MADE!');
                                        }
                             });

                        },
                        getTransactionInfo(){

                        let data= new FormData()

                        data.append('loanID',this.loanId)

                        axios.post('pages/productReturn/GetSingleLoanIdRequest.php',data)
                        .then((e)=>{

                        this.transactions=e.data.data
                        this.loanData=e.data.loanInfo
                            
                        if(!e.data.loanInfo)
                        {
                            swal('NO LOAN ID EXISTS OR CLOSED', 'CHECKOUT IN CUSTOMER TRANSACTIONS', 'error')
                            .then(e=>{

                                location.reload();
                            })

                            
                        }

                        if(this.transactions.length==0)
                        {

                        swal('NO LOAN ID EXISTS', 'CHECKOUT IN CUSTOMER TRANSACTIONS', 'error')
                        }
                        else
                        {
                        this.tableShow=true
                        }
                        })

                        },


                        }">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="loanID">Loan ID*</label>
                                    <input type="text" x-model="loanId" class="form-control" id="loanID" placeholder="Enter Loan ID of Customer">
                                </div>
                            </div>

                        </div>
                        <!-- second row of form -->
                        <div class="d-flex justify-content-end">
                            <div class="px-2">
                                <button type="button" x-on:click="getTransactionInfo" class="btn btn-sm btn-success" id="getLoanInfo"><i class="fa fa-tasks px-2"></i>LOAD</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row" x-show="tableShow">
                            <div class="col-6">
                                <p class="lead">Note : Returning The Product is CPU intensive task use it wisely</p>
                                <p class="lead text-danger">Notice : If the Bill has Completly Closed Refund the initial Amount Paid To the customer</p>
                            </div>

                            <div class="col-6">
                                <p class="lead">Loan Date : <span x-text="loanData.LN_ON_DATE"></span> </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Total Bill Amount:</th>
                                                <td x-text="loanData.LN_TAB_TOTAL_AMOUNT"></td>
                                            </tr>
                                            <tr>
                                                <th>Current Total</th>
                                                <td x-text="loanData.LN_TAB_BALANCE_AMOUNT"></td>
                                            </tr>
                                            <tr>
                                                <th>Initial Payment:</th>
                                                <td x-text="loanData.LN_TAB_INITIAL_AMOUNT"></td>
                                            </tr>
                                            <tr>
                                                <th>Discount:</th>
                                                <td x-text="loanData.LN_TAB_DISCOUNT"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3" x-show="tableShow">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Bill Info of Loan ID : <span x-text="loanId"></span> </h3>
                                        <div class="card-tools">

                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Customer ID</th>
                                                    <th>Product Name</th>
                                                    <th>Product Model</th>
                                                    <th>Product Price</th>
                                                    <th>Order Qty</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-for="(transaction, index) in transactions" key="index">
                                                    <tr>
                                                        <td x-text="++index"></td>
                                                        <td x-text="transaction.OR_OF_CUS"></td>
                                                        <td x-text="transaction.PRODUCT_NAME"></td>
                                                        <td x-text="transaction.PRODUCT_MODEL_NO"></td>
                                                        <td x-text="transaction.PRODUCT_PRICE"></td>
                                                        <td x-text="transaction.OR_OF_PR_QUANTITY"></td>
                                                        <td x-text="transaction.PRODUCT_PRICE*transaction.OR_OF_PR_QUANTITY"></td>
                                                        <td>
                                                            <button type="button" x-on:click="()=>returnProductRequest(transaction.OR_IT_ID)" class="btn btn-danger btn-sm"><i class="fa fa-trash px-1"></i>Return</button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- <div class="card-footer ">
                            <div class="float-right">
                                <button type="reset" class="btn btn-danger"><i class="fas fa-redo px-2"></i>Reset</button>
                                <button type="submit" class="btn btn-success addcus"><i class="fas fa-plus px-2"></i>ADD
                                    CUSTOMER</button>
                                <button type="submit" class="btn btn-warning" id="takeLoanBtn"><i class="fas fa-arrows-alt-h px-2"></i>ADD CUSTOMER & TAKE
                                    LOAN</button>
                            </div>
                        </div> -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.content -->
</div>
<?php
include_once("./assets/js_links.php");
?>