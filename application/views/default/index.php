<html>
<head>
	<?php $this->load->view('default/common/header')?>
</head>
<body>
	  <!-- Topbar -->
	  <?php $this->load->view('default/common/topbar')?>
	  <!--/ Topbar -->

	  <!-- TopNav -->
	  <?php $this->load->view('default/common/topnav')?>

      <!-- Static navbar -->
	<?php $this->load->view('default/common/navbar')?>      

	<?php $this->load->view($path_content)?>  	

	<?php $this->load->view('default/common/footer')?>
	
	<?php $this->load->view('default/common/login_form')?>

    <?php $this->load->view('default/common/script')?>
</body>
</html>	