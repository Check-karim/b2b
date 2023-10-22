import Link from 'next/link';
import { useState, useEffect } from 'react';

import { userService } from 'services';

export default Home;

function Home() {
    const [business, setBusiness] = useState('');
    const [orderStatus, setOrderStatus] = useState('');

    // console.log(orderStatus);
    
    return (
        <div className="p-4">
            <div className="container">
                <h1>Hi {userService.userValue?.firstName}!</h1>
                <hr/>
                <div className="row">

                    <div className="col">
                        <select 
                        value={business}
                        onChange={(e) => {setBusiness(e.target.value)}}
                        className="form-select" aria-label="Default select example">
                            <option value=''>Select Business</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div className="col">
                        <select 
                        value={orderStatus}
                        onChange={(e) => {setOrderStatus(e.target.value)}}
                        className="form-select" aria-label="Default select example">
                            <option value=''>Select Order Status</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    );
}
