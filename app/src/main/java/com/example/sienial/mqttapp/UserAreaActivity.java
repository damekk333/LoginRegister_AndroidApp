package com.example.sienial.mqttapp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class UserAreaActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_area);

        final EditText etServerAddress = (EditText) findViewById(R.id.etServerAddress);
        final EditText etPort = (EditText) findViewById(R.id.etPort);
        final Button bConnect = (Button) findViewById(R.id.bConnect);
        final Button bLogOut = (Button) findViewById(R.id.bLogOut);
        TextView tvWelcomeMsg = (TextView) findViewById(R.id.tvWelcomeMsg);

        Intent intent = getIntent();
        String name = intent.getStringExtra("name");


        // Display user details
        String message = name + ", welcome to your user area!";
        tvWelcomeMsg.setText(message);


        bLogOut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent loginIntent = new Intent(UserAreaActivity.this, LoginActivity.class);
                UserAreaActivity.this.startActivity(loginIntent);
            }
        });
    }
}
