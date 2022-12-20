<div class="formbold-main-wrapper">
    <!-- <h3 class="text-center mb-5">Input Peminjaman</h3> -->
    <div class="formbold-form-wrapper">
        <form action="Inputdata.php" method="POST" target="_blank">
            <div class="formbold-mb-5">
                <label for="name" class="formbold-form-label"> Nama Barang </label>
                <input type="text" name="nama barang" id="name" placeholder="Masukan Nama barang" class="formbold-form-input" />
            </div>
            <div class="formbold-mb-5">
                <label for="lama pinjam" class="formbold-form-label"> Lama Pinjam </label>
                <input type="text" name="lama pinjam" id="lama pinjam" placeholder="masukan lama peminjaman" class="formbold-form-input" />
            </div>
            <div class="formbold-mb-5">>
                <label for="cars">Lama pinjam:</label>
                <select name="cars" id="cars">
                    <option value="volvo">1 hari</option>
                    <option value="saab">2 hari</option>
                    <option value="opel">3 hari</option>
                    <option value="audi">4 hari</option>
                </select>
                <br><br>
            </div>


            <div>
                <button class="formbold-btn">Pinjam Sekarang</button>
            </div>
        </form>
    </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Inter", Arial, Helvetica, sans-serif;
    }

    .formbold-mb-5 {
        margin-bottom: 20px;
    }

    .formbold-pt-3 {
        padding-top: 12px;
    }

    .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
    }

    .formbold-form-wrapper {
        margin: 0 auto;
        max-width: 550px;
        width: 100%;
        background: white;
    }

    .formbold-form-label {
        display: block;
        font-weight: 500;
        font-size: 16px;
        color: #07074d;
        margin-bottom: 12px;
    }

    .formbold-form-label-2 {
        font-weight: 600;
        font-size: 20px;
        margin-bottom: 20px;
    }

    .formbold-form-input {
        width: 100%;
        padding: 12px 24px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        background: white;
        font-weight: 500;
        font-size: 16px;
        color: #6b7280;
        outline: none;
        resize: none;
    }

    .formbold-form-input:focus {
        border-color: #6a64f1;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-btn {
        text-align: center;
        font-size: 16px;
        border-radius: 6px;
        padding: 14px 32px;
        border: none;
        font-weight: 600;
        background-color: #6a64f1;
        color: white;
        width: 100%;
        cursor: pointer;
    }

    .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold--mx-3 {
        margin-left: -12px;
        margin-right: -12px;
    }

    .formbold-px-3 {
        padding-left: 12px;
        padding-right: 12px;
    }

    .flex {
        display: flex;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .w-full {
        width: 100%;
    }

    @media (min-width: 540px) {
        .sm\:w-half {
            width: 50%;
        }
    }
</style>