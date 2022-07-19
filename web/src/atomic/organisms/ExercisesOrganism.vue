<template>
  <div class="pb-2">
    <hr />
    <h5>Exercise 1. | 22.03.2022 - 15.04.2022</h5>
    Materials:
    <div class="row">
      <div class="col-md-6">
        <ul class="list-group">
          <li class="list-group-item border-0 border-bottom" v-for="item in [1, 2, 3, 4]" :key="item">
            <a href="#" class="text-decoration-none text-dark"
              ><i class="bi bi-file-earmark-text-fill h4"></i>Intro</a
            >
          </li>
        </ul>
      </div>
      <div class="col-6">
        <form>
          <div class="alert alert-success small" role="alert">
            A simple success alert—check it out!
          </div>
          <div class="text-last">
            <div class="mb-3">
              <label for="formFile" class="form-label"
                >Upload homework as .zip file |
                <span class="text-danger font-weight-bolder"
                  >until 22.03.2022 00:00</span
                ></label
              >
              <input class="form-control" type="file" id="formFile" />
              <small class="text-muted"
                >The zip file to be in format like
                name_lastname_exercise_number_date.zip</small
              >
            </div>
            <div class="text-end">
              <button class="btn btn-dark btn-sm">Upload</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>