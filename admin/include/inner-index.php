<!-- /. ROW  -->
<div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="board">
        <div class="panel panel-primary">
          <div class="number">
            <h3>
              <h3><?php echo getTotalNumberOfMessages();?></h3>
              <small>Support Requests</small>
            </h3>
          </div>
          <div class="icon">
            <i class="fa fa-comments fa-5x blue"></i>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="board">
        <div class="panel panel-primary">
          <div class="number">
            <h3>
              <h3><?php echo getTotalNumberOfQuotes();?></h3>
              <small>Total Quotes</small>
            </h3>
          </div>
          <div class="icon">
             <i class="fa fa-shopping-cart fa-5x green"></i>
          </div>

        </div>
      </div>
  </div>

  <div class="col-md-3 col-sm-12 col-xs-12">
    <div class="board">
      <div class="panel panel-primary">
        <div class="number">
          <h3>
            <h3><?php echo getTotalNumberOfCustomers();?></h3>
            <small>Total Customers</small>
          </h3>
        </div>
        <div class="icon">
           <i class="fa fa-user fa-5x yellow"></i>
        </div>
      </div>
    </div>
  </div>

</div>
<!--
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Donut Chart Example
          </div>
          <div class="panel-body">
              <div id="morris-donut-chart"></div>
          </div>
      </div>
  </div>
</div> -->
