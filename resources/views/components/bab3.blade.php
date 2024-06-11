<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 20px;
        background-color: #f9f9f9;
        color: #333;
    }
    h1, h2, h3 {
        color: #0056b3;
    }
    h1 {
        text-align: center;
    }
    .container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        width: 100%;
        max-width: 100%;
        height: 80vh;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .section {
        margin-bottom: 20px;
    }
    .section p {
        margin: 10px 0;
    }
    ul {
        margin: 10px 0;
        padding-left: 20px;
    }
    .card-body {
        align-self: center;
    }
</style>
<div class="container">
    @php
        $soal = App\Models\Kuis\Soal::all();
        $count = $soal->count();
    @endphp
    <h1 class="text-center my-4">Kuis Bab 3</h1>
    <div class="card-body">
        <h2 class="card-title">Kuis 1</h2>
        <p class="card-text">Deskripsi: Jawablah soal-soal berikut dengan benar.</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Soal: {{ $count }} soal</li>
            <li class="list-group-item">Kriteria Kelulusan: 100%</li>
        </ul>
        <a href="/kuis" class="button">Mulai Mengerjakan</a>
    </div>
</div>