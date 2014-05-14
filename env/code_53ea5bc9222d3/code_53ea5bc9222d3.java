import java.util.*;
import java.lang.*;
import java.io.*;

class Main
{
	public static void main (String[] args) throws java.lang.Exception
	{
				Scanner x = new Scanner(System.in);
		
		int i,k,t;
		int n1[];
		t=x.nextInt();
		int s[] = new int[t];
		int s2[] = new int[t];
		for(i=0;i<t;i++)
		{
			s[i]=x.nextInt();
			s2[i]=x.nextInt();
		}
		for(i=0;i<t;i++)
		{
			for(k=s[i];k<=s2[i];k++)
			{
				
			for(int l=2;l<=k/2;l++)
			{
				if(k%l==0 && k!=2)
				{
					break;
				}
				else if(l==k/2 || k==2 || k==3)
				{
					System.out.println(k);
					break;
				}
			}
			}
			System.out.println();
		}
	
	}
}
