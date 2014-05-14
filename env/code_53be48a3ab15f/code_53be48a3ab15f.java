import java.util.*;
import java.lang.*;
import java.io.*;

class Main
{
public static void main (String[] args) throws java.lang.Exception
{
BufferedReader r = new BufferedReader (new InputStreamReader (System.in));
String s;
while (!(s=r.readLine()).startsWith("42")) System.out.println(s);
}
}