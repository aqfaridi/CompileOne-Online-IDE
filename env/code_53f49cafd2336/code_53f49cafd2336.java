import java.io.*;
import java.math.*;
import java.util.Scanner;
class Solution
{
    public static void main(String[] args)throws Exception
    {
        BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
        Scanner in = new Scanner(System.in);
        int n=in.nextInt();
        int c=0;
        int i=0;
        BigInteger b1;
        BigInteger b2 = BigInteger.valueOf(300000000);
        String s[]= br.readLine().split(" ");
        while(i<n){
            int temp=Integer.parseInt(s[i]);
            b1=BigInteger.valueOf(temp);
            int x= b1.compareTo(b2);
            if(x<1){
                c++;
            }

            i++;
        }
        System.out.println(c);
    }
}
