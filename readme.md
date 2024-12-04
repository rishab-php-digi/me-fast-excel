# **me/fast-excel**

A lightweight and efficient package for importing and exporting Excel files in PHP applications. Inspired by [FastExcel](https://github.com/rap2hpoutre/fast-excel), this package focuses on simplicity and performance.

---

## **Features**
- Import data from Excel files into collections.
- Export data from collections to Excel files.
- Lightweight and fast, with no unnecessary overhead.
- Easy integration with Laravel and PHP applications.

---

## **Installation**

1. **Install via Composer**:
   ```bash
   composer require me/fast-excel
   ```

2. **Publish the Package** *(if needed)*:
   No configuration required. Just install and use.

---

## **Usage**

### **Exporting Data to Excel**
You can export data from collections, arrays, or Eloquent models to Excel files.

```php
use Me\FastExcel\FastExcel;

$data = collect([
    ['name' => 'John Doe', 'email' => 'john@example.com'],
    ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
]);

(new FastExcel($data))->export('users.xlsx');
```

---

### **Importing Data from Excel**
Import data from an Excel file into a collection for processing.

```php
use Me\FastExcel\FastExcel;

$collection = (new FastExcel)->import('users.xlsx');
$collection->each(function ($row) {
    // Process each row
    User::create($row);
});
```

---

### **Customizing Export**
Customize the exported columns using a callback function.

```php
use Me\FastExcel\FastExcel;

$data = User::all();

(new FastExcel($data))->export('users.xlsx', function ($user) {
    return [
        'Full Name' => $user->name,
        'Email Address' => $user->email,
    ];
});
```

---

### **Customizing Import**
Customize the import logic using a callback function.

```php
use Me\FastExcel\FastExcel;

$users = (new FastExcel)->import('users.xlsx', function ($row) {
    return User::create([
        'name' => $row['Full Name'],
        'email' => $row['Email Address'],
    ]);
});
```

---

### **Exporting Large Datasets**
Use Laravel's cursor or chunking to handle large datasets.

```php
use Me\FastExcel\FastExcel;

(new FastExcel(User::query()->cursor()))->export('large-users.xlsx');
```

---

## **Testing**
To ensure the package is working correctly:

1. Clone the repository.
2. Install dependencies:
   ```bash
   composer install
   ```
3. Run the test suite:
   ```bash
   vendor/bin/phpunit
   ```

---

## **Contributing**
Contributions are welcome! Feel free to submit a pull request or report issues.

---

## **License**
This package is open-sourced software licensed under the [MIT License](LICENSE).

---

Let me know if you want further edits or additional instructions included!