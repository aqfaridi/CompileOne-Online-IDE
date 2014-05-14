import java.io.*;
import java.util.*;

class Main
{
    public static final int MAX = 200010;
    public static final int  MOD = 1000000007;
    static int[] arr;
    static int[] cnt;
    static int[] cumm;
    static int expo(long a,long n)
    {
        long result = 1;
        while(n>0)
        {
            if(n%2 == 1)
                result = (result*a)%MOD;
            a = (a*a)%MOD;
            n >>= 1;
        }
        return ((int)result%MOD);
    }

    public static void main(String[] aqf)
    {
        try
        {
            cumm = new int[110];
            cnt = new int[110];
            arr = new int[MAX];
            int t,n,minn,maxx,dminn,dmaxx,prev,ans;
            BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
            BufferedOutputStream bos = new BufferedOutputStream(System.out);
            String eol = System.getProperty("line.separator");
            byte[] eolb = eol.getBytes();

            String str = br.readLine();
            t = Integer.parseInt(str);
            while(t>0)
            {
                minn = Integer.MAX_VALUE;
                maxx = Integer.MIN_VALUE;
                str = br.readLine();
                n = Integer.parseInt(str);

                str = br.readLine();
                StringTokenizer st = new StringTokenizer(str," ");
                int k = 0;
                while(st.hasMoreTokens())
                {
                    arr[k] = Integer.parseInt(st.nextToken());
                    minn = Math.min(minn,arr[k]);
                    maxx = Math.max(maxx,arr[k]);
                    k++;
                }

                dminn = (minn-maxx);
                dmaxx = (maxx-minn);
                ans = 1;
                for(int d=dminn;d<=dmaxx;d++)
                {
                    Arrays.fill(cumm,0);
                    Arrays.fill(cnt,0);
                    for(int i=0;i<n;i++)
                    {
                        prev = arr[i] - d;
                        if(prev >= minn && prev <= maxx)
                            cumm[arr[i]] = ((cumm[arr[i]] + cumm[prev])%MOD + cnt[prev])%MOD;
                        cnt[arr[i]]++;
                    }
                    for(int i=minn;i<=maxx;i++)
                        ans = (ans+cumm[i])%MOD;
                }
                ans = (ans + n)%MOD;
                ans =  (expo(2,n) - ans + MOD)%MOD;
                bos.write(new Integer(ans).toString().getBytes());
                bos.write(eolb);

                t -= 1;
            }
            bos.flush();
        }
        catch(Exception e){}
    }
}
