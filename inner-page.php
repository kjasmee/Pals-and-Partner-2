<?php include('include/header.php')?>

  <main id="main">

    <?php
    $SERVICE="";

    if(isset($_GET['service'])){
      $SERVICE_ID = $_GET['service'];
      switch($_GET['service']){
        case 1:
          $SERVICE="House Cleaning Service";
          echo "<script>$('#tab1').click();</script>";
          break;
        case 2:
          $SERVICE="Office and Commercial Cleaning";
          echo "<script>$('#tab2').click();</script>";
          break;
        case 3:
          $SERVICE="Vacate Cleaning";
          echo "<script>$('#tab3').click();</script>";
          break;
        case 4:
          $SERVICE="Apartment Cleaning";
          echo "<script>$('#tab4').click();</script>";
          break;
        default:
          $SERVICE="Service Not Found";
          break;
      }
    }
    ?>

    <section class="inner-page">
      <div class="container" data-aos="fade-up">
        <!-- ======= Tabs Section ======= -->
        <section id="tabs" class="tabs">
          <div class="container" data-aos="fade-up">

            <h4 class="d-none d-lg-block text-center">Why Pals and Partners Cleaning?</h4>

            <div class="col-lg-12 text-center">
              <img src="assets/img/why-us.jpg" alt="" class="img-fluid">
            </div><br>

            <ul class="nav nav-tabs row d-flex">
              <li class="nav-item col-3">
                <a class="nav-link <?php if($SERVICE_ID==1) echo("active show");?>" data-toggle="tab" href="#tab-1" id="tab1">
                  <i class="ri-gps-line"></i>
                  <h4 class="d-none d-lg-block">House Cleaning Service</h4>
                </a>
              </li>
              <li class="nav-item col-3">
                <a class="nav-link <?php if($SERVICE_ID==2) echo("active show");?>" data-toggle="tab" href="#tab-2" id="tab2">
                  <i class="ri-body-scan-line"></i>
                  <h4 class="d-none d-lg-block">Office and Commercial Cleaning</h4>
                </a>
              </li>
              <li class="nav-item col-3">
                <a class="nav-link <?php if($SERVICE_ID==3) echo("active show");?>" data-toggle="tab" href="#tab-3" id="tab3">
                  <i class="ri-sun-line"></i>
                  <h4 class="d-none d-lg-block">Vacate Cleaning</h4>
                </a>
              </li>
              <li class="nav-item col-3">
                <a class="nav-link <?php if($SERVICE_ID==4) echo("active show");?>" data-toggle="tab" href="#tab-4" id="tab4">
                  <i class="ri-store-line"></i>
                  <h4 class="d-none d-lg-block">Apartment Cleaning</h4>
                </a>
              </li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane <?php if($SERVICE_ID==1) echo("active show");?>" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 order-1 order-lg-1 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/img/service/service1.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-12 order-2 order-lg-2 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <h3>House Cleaning</h3>
                    <ul>
                      <li><i class="ri-check-double-line"></i> Are you tired of spending your free time cleaning your home?</li>
                      <li><i class="ri-check-double-line"></i> Are there dirty jobs in your house that you don’t have the time or equipment to tackle?</li>
                      <li><i class="ri-check-double-line"></i> Want your home cleaned to a professional standard?</li>
                      <li><i class="ri-check-double-line"></i> Call Pals and Partners Cleaning – the house cleaning experts!</li>
                    </ul>

                    <p>
                      When you’re looking for a house cleaning service, you need to choose a company that you can trust. Pals and Partners’s Cleaning has won more awards than any other Australian house cleaning company, so you know you’re in safe hands!
                    </p>
                    <p>
                      Working closely with you, will we find out exactly what you need and tailor a cleaning package to suit you. Whether you’re just looking for a one-off clean to spruce up your living space, or you’re looking for a regular home cleaning service, we will take care of things for you and leave your home looking like a million dollars.
                    </p>
                    <p>
                      No job is too big or too small! Whether you live in a small apartment, a one-storey home or a large multi-storey property, we will clean every room to the highest possible standards. No detail will go unnoticed – we are highly experienced professionals who take great pride in our work.
                    </p>
                    <p class="font-italic font-weight-bold">House cleaning services you can trust</p>
                    <p>Pals and Partners’s House Cleaning team will get you your weekends back by taking care of all your housework worries! Our team of trusted cleaners are small business owners, meaning they are working directly for you to achieve the highest possible results every time.</p>
                    <p>Working within your busy schedule is what our team does best. We can schedule regular weekly, fortnightly, monthly or even once-off cleans to suit your needs. Your local franchisee will supply all cleaning equipment and products, so you can sit back and relax knowing you’re in good hands. All our cleaners are police-checked, insured and, best of all, they are trained professionals. This means you can feel completely safe and secure letting our cleaning team into your home.</p>
                    <p>The best thing about being a franchise business is that we have franchises located in all states and territories. Wherever you are located, we will put you in contact with the closest franchise to your neighbourhood. This means whenever you need a cleaner, we can get a specialist to you quickly.</p>
                    <p>We have become an integral part of every community we operate in. We understand the needs of our clients in your area, and we are proud to have so many satisfied customers prepared to spread the word about how great our house cleaning services are!</p>

                    <p class="font-italic font-weight-bold">What can be included in our cleaning packages?</p>
                    <p>We offer a huge range of house cleaning services, including:</p>
                    <ul>
                      <li><i class="ri-check-double-line"></i> Mopping</li>
                      <li><i class="ri-check-double-line"></i> Vaccuming</li>
                      <li><i class="ri-check-double-line"></i> Dusting</li>
                      <li><i class="ri-check-double-line"></i> Sweeping</li>
                      <li><i class="ri-check-double-line"></i> Kitchen cleaning</li>
                      <li><i class="ri-check-double-line"></i> Bathroom/toilet cleaning</li>
                      <li><i class="ri-check-double-line"></i> Oven cleaning</li>
                      <li><i class="ri-check-double-line"></i> Mirrors/walls cleaning</li>
                      <li><i class="ri-check-double-line"></i> Surface cleaning</li>
                    </ul>

                    <p>We can also provide a wide range of other services on request. We specialise in a wide range of cleaning and repair jobs that other home cleaning companies don’t offer, such as cleaning carpets, curtains and upholstery, end of lease cleaning and even pressure cleaning the outside areas of your property. We can also clean your windows inside and out, giving you the perfect view from your home.</p>

                    <p>In addition, if some areas in your home are looking tired or worn, we can help restore them to their former glory! This includes repairing blinds and refreshing the appearance of any tiled areas and grouting in your home.</p>

                    <p>As well as leaving your home looking sparkling clean, we will leave it smelling fresh, too! Our state-of-the-art cleaning equipment and professional house cleaning expertise enable us to rid your home of unpleasant odours caused by pets or fatty ovens. This will allow you to relax and enjoy yourself in a lovely environment.</p>
                  </div>

                </div>
              </div>
              <div class="tab-pane <?php if($SERVICE_ID==2) echo("active show");?>" id="tab-2">
                <div class="row">
                  <div class="col-lg-12 order-1 order-lg-1 text-center">
                    <img src="assets/img/service/service2.jpg" alt="" class="img-fluid">
                  </div>

                  <div class="col-lg-12 order-2 order-lg-2 mt-3 mt-lg-0">
                    <h3>Office and Commercial Cleaning</h3>
                    <p>
                      First impressions mean everything, that’s why a clean building or office space is vital to any business’ performance and overall reputation. Keeping work spaces and buildings clean and tidy is not only our passion, but it’s what we’re good at! Our reliable team will work around your business’ hours to ensure it is spotless. We offer regular office cleaning, occasional cleans or even once-off cleans to get your business looking smart. From office/commercial cleaning, aged care/retirement cleaning, education cleaning, retail cleaning, medical cleaning, industrial cleaning, sports/leisure cleaning and hospitality cleaning. Pals and Partners’s Cleaning has the experience and the specialised skills to clean your premises efficiently and effectively. We can tailor packages to suit each and every business’ needs.
                    </p>
                    <p class="font-italic">
                      Your business can also take advantage of our specialised services that will further improve the look of your business. Our other cleaning services include:
                    </p>
                    <div class="row">
                      <div class="col-6">
                        <ul>
                          <li><i class="ri-check-double-line"></i> Carpet Cleaning</li>
                          <li><i class="ri-check-double-line"></i> Upholstery Cleaning</li>
                          <li><i class="ri-check-double-line"></i> Window Cleaning</li>
                          <li><i class="ri-check-double-line"></i> Graffiti Removal</li>
                          <li><i class="ri-check-double-line"></i> Pressure Cleaning</li>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul>
                          <li><i class="ri-check-double-line"></i> Floor Stripping and Sealing</li>
                          <li><i class="ri-check-double-line"></i> Tile and Grout Cleaning</li>
                          <li><i class="ri-check-double-line"></i> Fllet/ Commercial Car Detailing</li>
                          <li><i class="ri-check-double-line"></i> Blind Cleaning Reparis</li>
                        </ul>
                      </div>
                    </div>
                    <h3>Commercial Cleaning Services</h3>
                    <p>
                      Pals and Partners’s Cleaning offers a 100% satisfaction guarantee for all our services.
                    </p>
                    <p>
                      At Pals and Partners’s Cleaning, our office cleaning services extend to your small business, corporate headquarters or other space in need of commercial cleaning in Australia. We adapt to your schedule, so our cleaners are available for days or evenings, as requested.
                    </p>
                    <p>
                      Pals and Partners’s Cleaning crews treat each business as an individual entity. That means our cleaning specialists receive separate training for your facility and follow a checklist of must-do items so that nothing is missed. We can take on sole responsibility for cleaning your office or augment the services of your in-house staff. Just let us know what you need!
                    </p>
                    <p>
                      Every building has unique qualities and, no matter how new the property is, there are always areas that require special attention, such as break rooms, restrooms and high traffic areas. So, even if we see something not explicitly detailed in the contract, we clean it.
                    </p>
                    <h3>Our Specialty Commercial Cleaning Services</h3>
                    <p>
                      We offer a full menu of cleaning services that your business can take advantage of. Besides our regular office cleaning services, we have a range of specialised commercial cleaning services to keep your business clean inside and outside.
                    </p>
                    <p class="font-italic">
                      If areas of your business require attention, choose from the following services:
                    </p>
                    <ul>
                      <li><i class="ri-check-double-line"></i> Carpet Cleaning</li>
                      <li><i class="ri-check-double-line"></i> Upholstery Cleaning</li>
                      <li><i class="ri-check-double-line"></i> Window Cleaning</li>
                      <li><i class="ri-check-double-line"></i> Pressure Cleaning</li>
                      <li><i class="ri-check-double-line"></i> Floor Stripping and Sealing</li>
                      <li><i class="ri-check-double-line"></i> Tile and Grout Cleaning</li>
                      <li><i class="ri-check-double-line"></i> Fllet/ Commercial Car Detailing</li>
                      <li><i class="ri-check-double-line"></i> Blind Cleaning Reparis</li>
                    </ul>

                    <h3>What Are the Types of Cleaning Services?</h3>
                    <p>Our cleaning services include straightening cushions and pillows, sweeping and mopping the floors and dusting the walls, ledges, blinds, windowsills and bookshelves.</p>
                    <p class="font-italic">We also provide the following services:</p>
                    <ul>
                      <li><i class="ri-check-double-line"></i> Vacumming carpet Floors</li>
                      <li><i class="ri-check-double-line"></i> Emptying the trash</li>
                      <li><i class="ri-check-double-line"></i> Cleaning all glass</li>
                      <li><i class="ri-check-double-line"></i> Sanitising phones</li>
                      <li><i class="ri-check-double-line"></i> Scrubbing sinks</li>
                      <li><i class="ri-check-double-line"></i> Cleaning and disinfecting toilets</li>
                      <li><i class="ri-check-double-line"></i> Replacing paper products</li>
                      <li><i class="ri-check-double-line"></i> Cleaning breakroom</li>
                      <li><i class="ri-check-double-line"></i> Wiping down tables</li>
                    </ul>
                    <p>We also provide other services on an as-needed basis, including graffiti removal and deep-cleaning soiled carpets. If you have blinds in the office, our commercial office cleaning services can extend to blind cleaning. Tile and grout occasionally require extra attention in the form of grout and tile deep cleaning.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane <?php if($SERVICE_ID==3) echo("active show");?>" id="tab-3">
                <div class="row">
                  <div class="col-lg-12 order-1 order-lg-1 text-center">
                    <img src="assets/img/service/service3.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-12 order-2 order-lg-2 mt-3 mt-lg-0">
                    <h3>Vacate Cleaning</h3>
                    <p>
                       Moving house can be an exciting yet stressful time. If you have been renting a property you will need to return it to the real estate or landlord in its “original condition”. Every property will experience wear and tear however, having a professional clean can minimise the appearance of wear and tear – ensuring you get your bond back! Our vacate cleaners will clean to your real estate’s requirements (often printed out and given to the tenant when vacating). However, if no requirements are provided our cleaners will clean to the industry standard.  Please ensure to check your real agent’s requirements or guidelines to give them to your cleaner on the day.Our high standard of cleaning sets us apart from all other vacate cleaning companies in Melbourne. The experienced vacate cleaning teams leave no corner unturned, no spots missed, no surface left unattended and no dust left behind. As a result, we ensure your Bond Back. Our cleaners are trained professionals who provide their own cleaning equipment as well as chemicals, taking all the stress away from you.
                    </p>
                    <p class="font-italic">
                      Your Local Vacate Cleaning Expers
                    </p>
                    <p>
                      If you are moving out of a furnished property, our upholstery experts will give your furnishings a thorough clean. Unlike other companies we do not let just anyone clean your carpets and windows, we have dedicated professionals who will clean your carpets and windows with professional equipment and techniques. This ensures the best possible results and lowering the risk of any damage to the property from incorrect cleaning.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane <?php if($SERVICE_ID==4) echo("active show");?>" id="tab-4">
                <div class="row">
                  <div class="col-lg-12 order-1 order-lg-1 text-center">
                    <img src="assets/img/service/service4.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-12 order-2 order-lg-2 mt-3 mt-lg-0">
                    <h3>Apartment Cleaning</h3>
                    <p>
                      Call Pals and Partners’s Apartment Cleaners to ensure your living space is always neat and tidy. Our trustworthy and reliable team will ensure your home is cleaned to the highest standards. Your local franchisee will supply all cleaning equipment and products, so you can sit back and relax knowing you’re in good hands.
                    </p>
                    <p>
                      The Pals and Partners’s Apartment Cleaning team are fully insured, police checked and trained to ensure you are 100% happy with the services completed.
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section><!-- End Tabs Section -->
      </div>
    </section>

  </main><!-- End #main -->

  <?php include('include/footer.php')?>
