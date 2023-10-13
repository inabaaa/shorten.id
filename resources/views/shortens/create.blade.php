<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  </head>
  <body style="background-color: #f4f6fa">
    <!-- navbar -->
    @include('templates.navbar')
    <!-- end navbar -->

    <!-- content-create -->
    <div class="container">
      <h2 class="fw-bold mt-5 mb-5">Create New</h2>
      <form action="{{ route('shortens.store') }}" class="" method="post">
        @csrf
        <div class="row mt-4">
          <div class="col-6">
            <div class="mb-5">
              <label class="form-label">Title (Optional)</label>
              <input type="text" name="title" class="form-control" placeholder="" />
            </div>
            <div class="mb-3">
              <label class="form-label">Domain <img src={{ asset('assets/key.png') }} width="18" alt="" /></label>
              <input type="text" class="form-control" style="background-color: #e7ebf3" name="example-text-input" placeholder="Shorten.id" disabled />
            </div>
          </div>

          <div class="col-6">
            <div class="mb-5">
              <label class="form-label">URL</label>
              <input type="text" name="url" class="form-control" placeholder="" />
            </div>
            <div class="mb-5">
              <label class="form-label">Custom back-half (Optional)</label>
              <input type="text" name="custom" class="form-control" placeholder="" />
            </div>
          </div>
        </div>

        <div class="row justify-content-end mt-3">
          <div class="col-auto mt-2">
            <a href="{{ route('shortens.index') }}" class="text-dark text-decoration-none fw-bold">Back</a>
          </div>
          <div class="col-auto">
            <input type="submit" value="Create New" class="btn text-white p-2" style="background-color:#4ca653 ">
          </div>
        </div>
      </form>
    </div>
    <!-- end content-create -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
