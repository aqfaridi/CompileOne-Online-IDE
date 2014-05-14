import java.awt.*;
import java.awt.event.*;
import java.util.Scanner;
import javax.swing.*;
//import java.awt.geom.GeneralPath;
class carrom4
{
    static TextField t1;
    static JFrame frame;
    public static void main(String argf[])
    {
        frame=new JFrame();
        frame.setSize(1000,1000);
        frame.setVisible(true);
        carrom5 carrom=new carrom5();
        frame.add(carrom);
        frame.addKeyListener(carrom);
        frame.addMouseListener(carrom);
       
        
        
    }
}
class carrom5 extends JPanel implements KeyListener,MouseListener
{
int x1=350,y1=510,p=0,x,y,w=0,r=30;
   int lx,ly,pl=0;//line cordinate
    public void keyTyped(KeyEvent e) {
        //System.out.println(e.getKeyChar());
           }

    @Override
    public void keyPressed(KeyEvent e) {
        if(e.getKeyCode()==KeyEvent.VK_LEFT)
        {
            x1--;
             if(x1>=215&&x1<=468){
            repaint();
             }
        }
        if(e.getKeyCode()==KeyEvent.VK_RIGHT)
        {
            x1++;
             if(x1>=215&&x1<=468){
            repaint();
             }
        }
        if(e.getKeyCode()==KeyEvent.VK_ENTER)
        {
            pl=1;
             ly=100;lx=x1+15;
             //System.out.println("aks");
            repaint();
            
        }
       
        
        }
    

    @Override
    public void keyReleased(KeyEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

public void paintComponent(Graphics e)
{
    Graphics2D g2 = (Graphics2D) e;
		  g2.setStroke(new BasicStroke(5));
		  e.setColor(Color.BLACK);
		  e.fillRect(100,100,500,500);
		  e.drawRect(100,100,500,500);
		  e.setColor(new Color(181,101,29));
		  e.fillRect(120,120,460,460);
		  e.drawRect(120,120,460,460);
		  e.setColor(Color.white);
		  e.fillOval(125,125,30,30);
		  e.drawOval(125,125,30,30);
		  e.fillOval(545,125,30,30);
		  e.drawOval(545,125,30,30);
		  e.fillOval(125,545,30,30);
		  e.drawOval(125,545,30,30);
		  e.fillOval(545,545,30,30);
		  e.drawOval(545,545,30,30);
		  e.setColor(Color.BLACK);
		  g2.setStroke(new BasicStroke(3));
		  e.drawLine(220,180,480,180);
		  g2.setStroke(new BasicStroke(1));
		  e.drawLine(220,200,480,200);
		  e.setColor(new Color(158,22,19));
		  e.fillOval(215,180,18,20);
		  e.drawOval(215,180,18,20);
		  e.fillOval(468,180,18,20);
		
		e.drawOval(468,180,18,20);
		  e.setColor(Color.BLACK);
		  g2.setStroke(new BasicStroke(1));
		  e.drawLine(220,510,480,510);
		  g2.setStroke(new BasicStroke(3));
		  e.drawLine(220,530,480,530);
		  e.setColor(new Color(158,22,19));
		  e.fillOval(215,510,18,20);
		  e.drawOval(215,510,18,20);
		  e.fillOval(468,510,18,20);
		  e.drawOval(468,510,18,20);
		   e.setColor(Color.BLACK);
		  g2.setStroke(new BasicStroke(3));
		  e.drawLine(180,225,180,485);
		   g2.setStroke(new BasicStroke(1));
		  e.drawLine(200,225,200,485);
		  e.setColor(new Color(158,22,19));
		  e.fillOval(180,218,20,20);
		  e.drawOval(180,218,20,20);
		  e.fillOval(180,470,20,20);
		  e.drawOval(180,470,20,20);
		  e.setColor(Color.BLACK);
		  g2.setStroke(new BasicStroke(1));
		  e.drawLine(500,225,500,485);
		   g2.setStroke(new BasicStroke(3));
		  e.drawLine(520,225,520,485);
		  e.setColor(new Color(158,22,19));
		  e.fillOval(500,218,20,20);
		  e.drawOval(500,218,20,20);
		  e.fillOval(500,470,20,20);
		  e.drawOval(500,470,20,20);
		  e.setColor(Color.BLACK);
		  g2.setStroke(new BasicStroke(1));
		  e.drawLine(180,180,260,260);
		  e.drawLine(180,525,260,445);
		  e.drawLine(525,180,445,260);
		  e.drawLine(525,525,445,445);
		  e.drawArc(225,225,40,40,-120,150);
		  e.drawArc(440,230,40,40,150,150);
		   e.drawArc(227,437,40,40,120,-150);
		   e.drawArc(440,437,40,40,75,150);
		    e.setColor(new Color(158,22,19));
			e.fillOval(310,310,80,80);
		  e.drawOval(310,310,80,80);
		   e.setColor(new Color(181,101,29));
		  e.fillOval(320,320,60,60);
		  e.drawOval(320,320,60,60);
		  e.setColor(Color.pink);
	    
		   

		  //w++;
		  //Graphics2D g2=(Graphics2D)e;
		e.setColor(Color.pink);
		e.fillOval(x1,y1,r,r);
		e.setColor(Color.BLACK);
		e.drawOval(x1,y1,r,r);
                //to draw line from striker
                if(pl==1)
                {
                    e.drawLine(x1+15, y1+15, lx, ly);
                }
		 
}

    @Override
    public void mouseClicked(MouseEvent e) {
        if(e.getX()<=600&&e.getY()<=600&&e.getX()>=100&&e.getY()>=100)
        {
            p=1;
            lx=e.getX();
            ly=e.getY();
            repaint();
        }
    }

    @Override
    public void mousePressed(MouseEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void mouseReleased(MouseEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void mouseEntered(MouseEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void mouseExited(MouseEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}


 
 

