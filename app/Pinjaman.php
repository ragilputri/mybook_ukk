<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;

class Pinjaman extends Model
{
    use SerializesModels;

    protected $table = "pinjamen";
    protected $fillable = ['id_user', 'id_buku', 'tgl_pinjam', 'tgl_kembali', 'status', 'keterangan', 'pernyataan'];
}
