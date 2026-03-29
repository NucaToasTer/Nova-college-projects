using System;
using System.Runtime.InteropServices;
using System.Windows.Forms;

namespace boilerplate;

public partial class Form1 : Form
{
    private SaveData _save;
    private System.Windows.Forms.Timer timer1;
    private System.Windows.Forms.Timer timer2;
    private System.Windows.Forms.Timer timer3;
    private System.Windows.Forms.Timer timer4;
    private bool isRunning;
    private int counter = 0;

    public Form1()
    {
        InitializeComponent();
        _save = SaveManager.Load();

        timer1 = new System.Windows.Forms.Timer();
        timer1.Interval = 300;
        timer1.Tick += Timer_Tick1;
        timer1.Start();

        timer2 = new System.Windows.Forms.Timer();
        timer2.Interval = 300;
        timer2.Tick += Timer_Tick2;
        timer2.Start();

        timer3 = new System.Windows.Forms.Timer();
        timer3.Interval = 300;
        timer3.Tick += Timer_Tick3;
        timer3.Start();

        isRunning = true;
        timer4 = new System.Windows.Forms.Timer();
        timer4.Interval = 300;
        timer4.Tick += Timer_Tick4;
        timer4.Start();

        DisplaySavedTexts();

    }

    private void button1_Click(object sender, EventArgs e)
    {
        if (progressBar1.Value + 5 < progressBar1.Maximum)
        {
            Console.WriteLine("clicked");
            progressBar1.Value += 5;
        }
        else if (progressBar1.Value + 5 > progressBar1.Maximum)
        {
            progressBar1.Value = progressBar1.Maximum;
        }


    }

    private void button2_Click(object sender, EventArgs e)
    {
        if (progressBar2.Value + 5 < progressBar2.Maximum)
        {
            Console.WriteLine("clicked");
            progressBar2.Value += 5;
        }
        else if (progressBar2.Value + 5 > progressBar2.Maximum)
        {
            progressBar2.Value = progressBar2.Maximum;
        }
    }

    private void Timer_Tick1(object? sender, EventArgs e)
    {

        if (progressBar1.Value > progressBar1.Minimum)
        {
            progressBar1.Value -= 1;
        }
        else
        {
            progressBar1.Value = progressBar1.Minimum;
        }
    }


    private void Timer_Tick2(object? sender, EventArgs e)
    {

        if (progressBar2.Value > progressBar2.Minimum)
        {
            progressBar2.Value -= 1;
        }
        else
        {
            progressBar2.Value = progressBar2.Minimum;
        }
    }

    private void Timer_Tick3(object? sender, EventArgs e)
    {

        if (progressBar2.Value < progressBar2.Maximum / 2 || progressBar1.Value < progressBar1.Maximum / 2)
        {
            progressBar3.Value -= 1;
        }

        if (progressBar3.Value == 1)
        {
            timer3.Stop();
            progressBar3.Value = 0;
            isRunning = false;
        }

        if (progressBar3.Value >= 50 && progressBar3.Value <= 75)
        {
            pictureBox1.Image = System.Drawing.Image.FromFile("assets/kuchipatchi75.png");
        }

        if (progressBar3.Value >= 25 && progressBar3.Value <= 49)
        {
            pictureBox1.Image = System.Drawing.Image.FromFile("assets/kuchipatchi50.png");
        }

        if (progressBar3.Value >= 1 && progressBar3.Value <= 24)
        {
            pictureBox1.Image = System.Drawing.Image.FromFile("assets/kuchipatchi25.png");
        }

        if (progressBar3.Value == 0)
        {
            pictureBox1.Image = System.Drawing.Image.FromFile("assets/kuchipatchi0.png");
        }

    }

    private void Timer_Tick4(object? sender, EventArgs e)
    {

        if (isRunning)
        {
            label1.Text = counter.ToString();
            counter += 1;

        }
        else
        {
            timer4.Stop();
            if (counter > 0)
            {
                counter -= 1;
                _save.scores.Add(counter.ToString());
                SaveManager.Save(_save);
            }
            DisplaySavedTexts();
        }
    }

private void DisplaySavedTexts()
    {
        if (_save.scores.Count == 0)
        {
            listBox1.Items.AddRange(new object[] { "No saved scores yet." });
            return;
        }

        var recent = _save.scores
            .AsEnumerable()
            .Reverse()
            .Take(5);

        listBox1.Items.Clear();
        listBox1.Items.AddRange(recent.ToArray());
    }


}