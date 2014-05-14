#include<stdio.h>
int main()
{
	int t;
	char s[1000002];
	scanf("%d",&t);
	int a[1000002];
	int b[1000002];
	getchar();
	while(t--) {
		int i;
		for(i = 0; i < 1000002; i++)
		a[i] = b[i] = 0;
		scanf("%s",s);
		int j,k;
		j=k=0;
		for(i = 0; s[i]; i++) {
			if(s[i] >= 48 && s[i] <= 57)
				a[j++] = s[i]-48;
			else if(s[i] < 48)
				b[k++] = s[i];
		}
		long long int sum;
		sum = a[0];
		for(i = 1; i < j; i++) {
			if(b[i-1] == 43)
			sum += a[i];
			else if(b[i-1] == 42)
			sum *= a[i];
			else if(b[i-1] == 45)
			sum -= a[i];
			else if(b[i-1] == 37)
			sum %= a[i];
			else
			sum /= a[i];
		}
		printf("%Ld\n",sum);
	}
	return 0;
}