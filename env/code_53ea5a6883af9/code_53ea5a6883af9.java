import java.util.*;

class TestClass {

	/**
	 * @param args
	 */
	public static void main(String[] args){
		// TODO Auto-generated method stub
		Scanner x = new Scanner(System.in);
		
		int i,j,k,t;
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
				
			for(int l=2;l<=k;l++)
			{
				if(k%l==0 && k!=2)
				{
					break;
				}
				else if(l==k-1 || k==2)
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

