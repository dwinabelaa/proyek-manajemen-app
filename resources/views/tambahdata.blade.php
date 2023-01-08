<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Tambah Data</title>
</head>

<body>
    <div class="p-5">

        <h1 class="font-bold text-xl">Tambah Data Proyek</h1>
        @if (session()->has('msg'))
            <div class="alert alert-info shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current flex-shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('msg') }}</span>
                </div>
            </div>
        @endif
        <form action="/projects" method="post" class="flex flex-col" enctype="multipart/form-data">
            @csrf
            <label for="name">Nama Proyek</label>
            <input type="text" name="name" placeholder="Nama Proyek"
                class="input input-bordered w-full max-w-xs my-2" />
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="client">Nama Klien</label>
            <input type="text" name="client" placeholder="Nama Klien"
                class="input input-bordered w-full max-w-xs my-2" />
            @error('client')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="leader_name">Nama Leader</label>
            <input type="text" name="leader_name" placeholder="Leader Name"
                class="input input-bordered w-full max-w-xs my-2" />
            @error('leader_name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="leader_email">Email Leader</label>
            <input type="email" name="leader_email" placeholder="Leader Email"
                class="input input-bordered w-full max-w-xs my-2" />
            @error('leader_email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="leader_image">Foto Leader</label>
            <input type="file" onchange="readURL(this);" name="leader_image"
                class="file-input file-input-ghost w-full max-w-xs" />
            <div class="m-2">
                <img src="https://via.placeholder.com/10" id="image-upload" class="rounded-full w-10 h-10">
            </div>
            @error('leader_image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="start_date">Tanggal Dimulai</label>
            <input type="date" name="start_date" class="max-w-xs border border-black rounded p-3">
            @error('start_date')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="end_date">Tanggal Berakhir</label>
            <input type="date" name="end_date" class="max-w-xs border border-black rounded p-3">
            @error('end_date')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="progress">Progress</label>
            <input type="range" id="progressInput" name="progress" min="0" max="100" value="30"
                class="range range-xs max-w-xs" />
            <p id="progress"></p>
            <button type="submit" class="bg-base-300 mt-3 rounded py-4  max-w-xs">BUAT</button>
        </form>
    </div>

    <script>
        let progressInput = document.getElementById('progressInput')
        let progress = document.getElementById('progress');
        progress.innerHTML = progressInput.value + "%";

        progressInput.oninput = function() {
            progress.innerHTML = this.value + "%";
        }

        function readURL(input) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-upload').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
