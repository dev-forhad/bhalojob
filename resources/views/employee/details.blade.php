<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>create profile</title>
    <link rel="stylesheet" href="{{asset('css/employee_style.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <section
      class="employee-profile-creation-boxbg=bg-light col-lg-8 col-12 m-auto px-0 mx-0"
    >
      <!-- nav header  -->
      <div
        class="col-md-12 py-2 d-flex justify-content-between align-content-center mt-3"
      >
        <div class="w-50">
          <img class="img-fluid" src="./assets/logo.png" alt="" />
        </div>
        <div
          class="language-toggle"
          role="group"
          aria-label="Language Selector w-50"
        >
          <input type="radio" id="jpRadio" name="language" value="jp" />
          <label for="jpRadio">JP</label>

          <input type="radio" id="enRadio" name="language" value="en" checked />
          <label for="enRadio">EN</label>

          <input type="radio" id="bnRadio" name="language" value="bn" />
          <label for="bnRadio">BN</label>
        </div>
      </div>

      <div class="profile-creation-heading-com w-100">
        <h1>Company Details</h1>
      </div>

      <!-- starting form  -->
      <form class="col-11 m-auto" action="" method="post">
        <!-- body  -->
        <div class="row">
          <div class="py-2 col-12">
            <label
              class="fw-bolder d-block pt-2 px-1 input-label"
              for="tstablishment"
              >Year of Establishment</label
            >
            <select
              class="input-box company_details_border"
              name="tstablishment"
              id="gender"
            >
              <option value="2018">2018</option>
              <option value="female">Female</option>
            </select>
          </div>

          <div class="py-2 col-12">
            <label
              class="fw-bolder d-block pt-2 px-1 input-label"
              for="com-size"
              >Company Size</label
            >
            <select
              class="input-box company_details_border"
              name="com-size"
              id="gender"
            >
              <option value="Select Company Size">Select Company Size</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>

        <div class="py-2">
          <label class="fw-bolder d-block pt-2 px-1 input-label" for="Address"
            >Company Address</label
          >

          <div class="row">
            <div class="py-2 col-12">
              <select
                class="input-box company_details_border"
                name="company"
                id="gender"
              >
                <option value="Country">Country</option>
                <option value="female">Female</option>
              </select>
            </div>

            <div class="py-2 col-12">
              <select
                class="input-box company_details_border"
                name="com-size"
                id="gender"
              >
                <option value="State/Division">State/Division</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="py-2 col-12">
              <select
                class="input-box company_details_border"
                name="company"
                id="gender"
              >
                <option value="City">City</option>
                <option value="female">Female</option>
              </select>
            </div>

            <div class="py-2 col-12">
              <select
                class="input-box company_details_border"
                name="com-size"
                id="gender"
              >
                <option value="Postal Code">Postal Code</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
        </div>

        <div class="py-2 px-0 col-12">
          <label
            class="fw-bolder d-block pt-2 px-1 input-label"
            for="industry-type"
            >Industry Type</label
          >
          <select
            class="input-box company_details_border"
            name="industry-type"
            id="gender"
          >
            <option value="Select Category">Select Category</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div class="py-2 col-12 px-0">
          <label
            class="fw-bolder d-block pt-2 px-1 input-label"
            for="industry-type"
            >Industry Type</label
          >
          <textarea
            class="input-box text-area-com company_details_border"
            name="description"
            id="description"
            cols="30"
            rows="10"
          ></textarea>
        </div>

        <div class="py-2 col-12">
          <label
            class="fw-bolder d-block pt-2 px-1 input-label"
            for="industry-type"
            >Business/Trade License No:
          </label>
          <input
            type="text"
            class="input-box company_details_border"
            placeholder="Business/Trade License No"
            id="description"
          />
        </div>

        <div class="py-2 col-12">
          <label
            class="fw-bolder d-block pt-2 px-1 input-label"
            for="industry-type"
          >
            RL No (Only for Recruiting Agency)
          </label>
          <div class="d-flex bg-light align-content-center">
            <div class="h5 pt-2 px-1 fw-bolder">RL</div>
            <input
              type="text"
              class="input-box company_details_border"
              placeholder="Business/Trade License No"
              id="description"
            />
          </div>
        </div>

        <div class="text-center py-4">
          <a class="switch-button continue-com-btn w-100" href=""
            >Continue <i class="fa-solid px-4 fa-arrow-right"></i
          ></a>
        </div>
      </form>
    </section>

    <div>&copy;</div>

    <script src="{{asset('js/employee.js')}}"></script>
    <!-- bootstrap 4 script  -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
