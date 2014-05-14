using System;

public class Test
{
	public static void Main()
	{
		// your code goes here
		Console.Write("Enter N:\t");
            int n = int.Parse(Console.ReadLine().Trim());
            for (int i = 1;i <=n; i++)
            {
                string s = new string(new BitArray(new byte[] { (byte)   i }).Cast<bool>().Select(bit => bit ? '1' : '0').Reverse().ToArray());
                Console.WriteLine(s);
            }

            Console.ReadKey(); 
	}
}
