# gogo-PHP-exam

This CLI app was done for an exam from a company I applied for.
Two hours was given.

The app does as the following guidelines indicate.
1. Create the CSV format data file (writers.csv) format displayed below.

| id | name | birthday   | gender | phone-number |
|----|------|------------|--------|--------------|
| 1  | John | 1998/05/04 | male   | 09012345678  |
| 2  | Mary | 1999/12/18 | female | 09023456789  |
| 3  | Rex  | 1998/02/10 | male   | 09034567890  |

2. Validate the input data
![image](https://user-images.githubusercontent.com/55343444/172079126-5573f617-eabe-4478-bc5c-3af8c33dd5fa.png)

4. Output the input data, if the input data is invalid, output error message instead of original data
(see table below).

| id | name | birthday   | gender | phone-number |
|----|------|------------|--------|--------------|
| 1  | John | 1998/05/04 | male   | 09012345678  |
| 2  | Mary | __Error format__ | female | 09023456789  |
| 3  | Rex  | 1998/02/10 | __Error required__   | 09034567890  |

---

To run the app, simply type in the command-line:
php index.php sample.csv

Edit sample.csv as you please.
