<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  </head>
  <body style="background-color: #f4f6fa">
    <!-- navbar -->
    @include('templates.navbar')
    <!-- end navbar -->

    <!-- tools -->
    <div class="container">
      <div class="row pt-5 mb-5">
        <div class="col">
          <p>0 selected</p>
        </div>
        <div class="col-auto text-end">
          <a class="btn btn-outline-secondary text-dark rounded-1 py-2" href="#"><img src="assets/kalender.png" alt="" width="15" height="auto" /> Filter by created date</a>
        </div>
        <div class="col-auto text-end">
          <a class="btn btn-outline-secondary text-dark rounded-1 py-2" href="#"><img src="assets/filter.png" alt="" width="15" height="auto" /> Add Filter</a>
        </div>
        <div class="col-auto text-end">
          <a href="{{ route('shortens.create') }}" class="btn text-white rounded-1 py-2" style="background-color: #4ca653" ><img src="assets/create.png" alt="" width="15" height="auto" /> Create New</a>
        </div>
      </div>
    </div>
    <!-- end tools -->

    <!-- content-dashboard -->
    @foreach ($shortens as $shorten)
    <div class="container">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row gap-0 justify-content-end pt-3 pe-5">
              <!-- copy -->
              <div class="col-auto pe-0">
                <a href="#"><img src="assets/COPY.png" width="55" alt="" /></a>
              </div>
              <!-- end copy -->

              <!-- edit -->
               <div class="col-auto">
                <a href="{{ route('shortens.show', $shorten->id) }}"><img src="assets/EDIT.png" width="30" alt="" /></a>
               </div>
              <!-- end edit -->

              <!-- delete -->
              <div class="col-auto ps-0">
                <form action="{{ route('shortens.destroy', $shorten->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 p-0"><img src="assets/DELETE.png" width="30" alt="" /></button>
                </form>
              </div>
              <!-- end delete -->
            </div>

            <!-- table -->
            <div class="row mb-3">
              <div class="col-auto">
                <div class="form-check ps-5">
                  <input class="form-check-input border-secondary" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
              </div>
              <div class="col-auto">
                <div class="mb-3">
                  <a href="#" class="text-decoration-none text-dark"><h4 class="fw-bold">{{ $shorten->title}}</h4></a>
                  <a href="{{ $shorten->custom }}" class="text-decoration-none">{{ $shorten->custom }}</a>
                  <p>{{ $shorten->url }}</p>
                </div>
              </div>
            </div>
            <!-- end table -->

            <!-- date & visit -->
            <div class="row ps-5">
              <div class="col-auto">
                <div class="mb-3 ps-4">
                  <p><img src="assets/kalender.png" alt="" width="20" /> {{ $shorten->created_at }}</p>
                </div>
              </div>
              <div class="col-auto">
                <div class="mb-3">
                  <p><img src="assets/visit.png" alt="" width="20" /> {{ $shorten->clicks }} click</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      @endforeach
    <!-- end content-dashboard -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).on('submit','#saveshorten', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("save_shorten", true);

            $.ajax({
                type: "POST",
                url: "{{ route('shortens.update', $shorten->id) }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {

                }
            });
        });
    </script>

  </body>
</html>
