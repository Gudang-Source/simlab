# SIMLAB

SIMLAB (Sistem Informasi Manajemen Laboratorium) merupakan sebuah sistem informasi untuk memanajemen kegiatan praktikum berbasis CodeIgniter.


## Informasi Rilis

Aplikasi ini sedang dalam tahap pembangunan dan belum melewati tahap uji coba. Fitur-fitur yang sedang dalam tahap pengembangan dapat dilihat di url.

## Getting Started

Instalasi aplikasi dapat dilihat dibawah

### Prerequisites

Hal-hal yang diperlukan untuk menjalankan SIMLAB antara lain;

1. PHP 7.0+
2. Web Server
3. MariaDB 10+
4. simlab.sql


### Instalasi

Langkah-langkah instalasi aplikasi

##### 1. Clone aplikasi.

```
$ cd /your/path/public_html/
```
```
$ git clone https://github.com/agumil/simlab.git
```

##### 2. Import Database
```
$ mysql -u root -p
```
```
mysql> CREATE DATABASE simlab;
```
```
$ mysql -u username -p simlab < simlab.sql
```


## Built With

* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) - Framework PHP
* [Bootsrap](https://github.com/twbs/bootstrap) - Framework CSS
* [DataTables](https://datatables.net/) - Advanced table plug-in jQuery javascript library.
* [Ela Admin Template](https://github.com/puikinsh/ElaAdmin) - Template dashboard

## Kontribusi

Coming soon.

## Versioning

Kami menggunakan [git](https://git-scm.com/) untuk versioning. Versi yang tersedia sedang dalam tahap pengembangan.

## Authors

* **Agung Gumilang** -*Pengembang back-end SIMLAB*- [agumil](https://github.com/PurpleBooth)
* **Tezar Akbar** -*Pengembang front-end SIMLAB*-


## Lisensi

Proyek ini dibawah lisensi MIT, silahkan baca file [LICENSE.md](LICENSE.md) untuk informasi lebih lanjut.