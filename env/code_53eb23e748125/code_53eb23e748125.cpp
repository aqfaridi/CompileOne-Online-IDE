#include <iostream>
#include <iomanip>
using namespace std;

//FUNCTIONS

int IsLeapYear(int year)
{
	int leap;
	if(year%400=0)
	{
		leap=1; //is leap year
	}
	else 
	{
		leap=0; //is not leap year
	}
}
int DaysInMonth (int month)
{
	int days[]={31,28,31,30,31,30,31,31,310,31,30,31}
	return days[month];
}

int PrintCalendar (int  
{
if (month==1)
		cout << "January  ";
	else if (month==2)
		cout << "February  ";
	else if (month==3)
		cout << "March  ";
	else if (month==4)
		cout << "April  ";
	else if (month==5)
		cout << "May  ";
	else if (month==6)
		cout << "June  ";
	else if (month==7)
		cout << "July  ";
	else if (month==8)
		cout << "August  ";
	else if (month==9)
		cout << "September  ";
	else if (month==10)
		cout << "October  ";
	else if (month==11)
		cout << "November  ";
	else if (month==12)
		cout << "December  ";
	cout << setw(2) << year;
	cout << endl << endl;
	cout << "Sun  " << setw(2) << "Mon  " << setw(2) << "Tues  " << setw(2) << "Wed  " << setw(2) << "Thurs  " << setw(2) << "Fri  " << setw(2) << "Sat  " << endl;




int PrintDay(int day)
{
	for (days[i])
	{
		int day = StartDay;
		cout << num;
		day++;
		if (day > 7)
		{
			cout << endl;
			day = 1;
		}
	}
}

int FirstDay(days[])
{
	const int Jan_Num=31;
	int first_dat, int Jan_Num, int tot_m2, int month;

	if (month==1)
		tot_m2=31*(year-1900)+(365*(year-1900));
	else if (month==2)
		tot_m2=28*(year-1900)+(365*(year-1900));
	else if (month==3)
		tot_m2=31*(year-1900)+(365*(year-1900));
	else if (month==4)
		tot_m2=30*(year-1900)+(365*(year-1900));
	else if (month==5)
		tot_m2=31*(year-1900)+(365*(year-1900));
	else if (month==6)
		tot_m2=30*(year-1900)+(365*(year-1900));
	else if (month==7)
		tot_m2=31*(year-1900)+(365*(year-1900));
	else if (month==8)
		tot_m2=31*(year-1900)+(365*(year-1900));
	else if (month==9)
		tot_m2=30*(year-1900)+(365*(year-1900));
	else if (month==10)
		tot_m2=31*(year-1900)+(365*(year-1900));
	else if (month==11)
		tot_m2=30*(year-1900)+(365*(year-1900));
	else if (month==12)
		tot_m2=31*(year-1900)+(365*(year-1900));
	first_day=(1+(tot_m1+tot_m2))%7;
}
void main ()
{
	int month, year;
	cout << "Enter month (1-12) or 0 to quit: ";
	cin >> month;
	cout << "Enter year (1900 or above): ";
	cin >> year;
	
}