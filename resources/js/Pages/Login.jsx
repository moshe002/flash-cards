import React from 'react';
import { useState } from 'react';
import { router } from '@inertiajs/react';
import { toast, Bounce } from 'react-toastify';
import axios from 'axios';

export default function Login() {

    const [loginValues, setLoginValues] = useState({
        email: '',
        password: '',
    });

    const handleLogin = (event) => {
        event.preventDefault();
        try {
            const response = router.post('/login', loginValues);
            if (response) {
                console.log('Successfully logged in.');
            }
        } catch (error) {
            console.error('Error logging in, error: ', error);
        }
    };

    const handleChange = (event) => {
        const key = event.target.id;
        const value = event.target.value;

        setLoginValues(loginValues => ({
            ...loginValues,
            [key]: value,
        }));
    };
  
    return (
        <div className='flex flex-col items-center justify-evenly h-screen p-5'>
            <h1>Login here</h1>
            <form onSubmit={handleLogin} className='flex flex-col gap-5 p-5'>
                <div className='flex justify-between gap-10'>
                    <label htmlFor='email'>Email:</label>
                    <input  
                        id='email' 
                        className='p-2 border-2' 
                        type='email'
                        value={loginValues.email} 
                        required
                        onChange={handleChange} 
                    />
                </div>
                <div className='flex justify-between gap-10'>
                    <label htmlFor='password'>Password:</label>
                    <input 
                        id='password' 
                        className='p-2 border-2' 
                        type='password' 
                        value={loginValues.password}
                        required
                        onChange={handleChange}
                    />
                </div>
                <button type='submit'>
                    ENTER
                </button>
            </form>
        </div>
  )
}
