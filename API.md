| No | Method | URL | Body (jika ada) | Status Code | Contoh Response / Keterangan |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | **GET** | `/api/books` | - | `200 OK` | `{"data": [{"id": 2, "judul": "The Midwest Sky", ...}], "links": {...}, "meta": {...}}` |
| 2 | **GET** | `/api/books?judul=...` | - | `200 OK` | Mengembalikan daftar buku yang terfilter berdasarkan judul |
| 3 | **GET** | `/api/books?category_id=...` | - | `200 OK` | Mengembalikan daftar buku yang terfilter berdasarkan ID kategori |
| 4 | **POST** | `/api/books` | JSON (judul, penulis, penerbit, tahun_terbit, stok, category_id) | `201 Created` | Menyimpan buku baru ke database dan mengembalikan data buku ter-nested |
| 5 | **POST** | `/api/books` *(Gagal)* | Kosong / Invalid | `422 Unprocessable Entity` | Mengembalikan pesan error validasi per field (misal: *Judul buku wajib diisi*) |
| 6 | **PUT** | `/api/books/{id}` | JSON (data buku yang diperbarui) | `200 OK` | Memperbarui data buku berdasarkan ID |
| 7 | **DELETE** | `/api/books/{id}` | - | `200 OK` | `{"message": "Buku berhasil dihapus."}` |
| 8 | **GET** | `/api/members` | - | `200 OK` | Mengembalikan daftar anggota (members) dengan pagination |
| 9 | **GET** | `/api/members/{id}` | - | `200 OK` | Mengembalikan detail data anggota berdasarkan ID |
| 10 | **GET** | `/api/loans` | - | `200 OK` | Mengembalikan daftar transaksi peminjaman lengkap dengan relasi `member`, `petugas`, dan `books` |
| 11 | **POST** | `/api/loans` | JSON (member_id, user_id, tanggal_pinjam, tanggal_kembali, book_ids[]) | `201 Created` | Membuat transaksi peminjaman buku baru dengan status `"dipinjam"` |
| 12 | **PUT** | `/api/loans/{id}/kembalikan` | - | `200 OK` | Memperbarui status peminjaman menjadi `"dikembalikan"` dan mengisi `tanggal_dikembalikan` |
| 13 | **GET** | `/api/stats` | - | `200 OK` | `{"total_buku": 5, "total_anggota": 3, "peminjaman_aktif": 1}` |