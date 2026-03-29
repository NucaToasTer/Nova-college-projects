namespace boilerplate;

partial class Form1
{

    private System.ComponentModel.IContainer components = null;
    private System.Windows.Forms.PictureBox pictureBox1;
    private System.Windows.Forms.ProgressBar progressBar1;
    private System.Windows.Forms.ProgressBar progressBar2;
    private System.Windows.Forms.ProgressBar progressBar3;
    private System.Windows.Forms.Button button1;
    private System.Windows.Forms.Button button2;
    private System.Windows.Forms.ListBox listBox1;
    private System.Windows.Forms.Label label1;
    private System.Windows.Forms.Label label2;
    private System.Windows.Forms.Label label3;
    private System.Windows.Forms.Label label4;

    protected override void Dispose(bool disposing)
    {
        if (disposing && (components != null))
        {
            components.Dispose();
        }
        base.Dispose(disposing);
    }

    #region Windows Form Designer generated code

    private void InitializeComponent()
    {
        this.components = new System.ComponentModel.Container();
        this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
        this.ClientSize = new System.Drawing.Size(1200, 900);
        this.Text = "Form1";

        this.pictureBox1 = new System.Windows.Forms.PictureBox();
        this.pictureBox1.Location = new System.Drawing.Point(316, 186);
        this.pictureBox1.Size = new System.Drawing.Size(567, 527);
        this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
        this.pictureBox1.Image = System.Drawing.Image.FromFile("assets/kuchipatchi100.png"); //567*527
        this.Controls.Add(this.pictureBox1);

        this.components = new System.ComponentModel.Container();
        this.progressBar1 = new System.Windows.Forms.ProgressBar();
        this.SuspendLayout();
        this.progressBar1.Location = new System.Drawing.Point(20, 75);
        this.progressBar1.Name = "progressBar1";
        this.progressBar1.Size = new System.Drawing.Size(200, 30);
        this.progressBar1.TabIndex = 0;
        this.progressBar1.Value = 100;
        this.Controls.Add(this.progressBar1);

        
        this.progressBar2 = new System.Windows.Forms.ProgressBar();
        this.SuspendLayout();
        this.progressBar2.Location = new System.Drawing.Point(980, 75);
        this.progressBar2.Name = "progressBar2";
        this.progressBar2.Size = new System.Drawing.Size(200, 30);
        this.progressBar2.TabIndex = 0;
        this.progressBar2.Value = 100;
        this.Controls.Add(this.progressBar2);


        this.progressBar3 = new System.Windows.Forms.ProgressBar();
        this.SuspendLayout();
        this.progressBar3.Location = new System.Drawing.Point(500, 100);
        this.progressBar3.Name = "progressBar3";
        this.progressBar3.Size = new System.Drawing.Size(200, 30);
        this.progressBar3.TabIndex = 0;
        this.progressBar3.Value = 100;
        this.Controls.Add(this.progressBar3);

        this.button1 = new System.Windows.Forms.Button();
        this.button1.Location = new System.Drawing.Point(50, 800);
        this.button1.Size = new System.Drawing.Size(100, 30);
        this.button1.Text = "eten";
        this.button1.Click += new System.EventHandler(this.button1_Click);
        this.Controls.Add(this.button1);

        this.button2 = new System.Windows.Forms.Button();
        this.button2.Location = new System.Drawing.Point(950, 800);
        this.button2.Size = new System.Drawing.Size(100, 30);
        this.button2.Text = "drinken";
        this.button2.Click += new System.EventHandler(this.button2_Click);
        this.Controls.Add(this.button2);

        // ListBox1
        this.listBox1 = new System.Windows.Forms.ListBox();
        this.listBox1.Location = new System.Drawing.Point(950, 300);
        this.listBox1.Size = new System.Drawing.Size(200, 200);
        
        // Add items to the ListBox
        this.listBox1.Items.AddRange(new object[] {});
        
        this.Controls.Add(this.listBox1);

       this.label1 = new System.Windows.Forms.Label();
        this.label1.Location = new System.Drawing.Point(20, 225);
        this.label1.Size = new System.Drawing.Size(200, 50);
        this.label1.Text = "score";
        this.label1.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
        this.label1.Font = new System.Drawing.Font("Arial", 10);
        this.Controls.Add(this.label1);

        this.label2 = new System.Windows.Forms.Label();
        this.label2.Location = new System.Drawing.Point(20, 30);
        this.label2.Size = new System.Drawing.Size(55, 50);
        this.label2.Text = "eten:";
        this.label2.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
        this.label2.Font = new System.Drawing.Font("Arial", 10);
        this.Controls.Add(this.label2);

        this.label3 = new System.Windows.Forms.Label();
        this.label3.Location = new System.Drawing.Point(980, 30);
        this.label3.Size = new System.Drawing.Size(80, 50);
        this.label3.Text = "drinken:";
        this.label3.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
        this.label3.Font = new System.Drawing.Font("Arial", 10);
        this.Controls.Add(this.label3);

        this.label4 = new System.Windows.Forms.Label();
        this.label4.Location = new System.Drawing.Point(390, 55);
        this.label4.Size = new System.Drawing.Size(300, 50);
        this.label4.Text = "welzijn:";
        this.label4.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
        this.label4.Font = new System.Drawing.Font("Arial", 10);
        this.Controls.Add(this.label4);

    }

    #endregion
}